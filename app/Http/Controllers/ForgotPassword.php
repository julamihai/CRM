<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;


class ForgotPassword extends Controller
{
    public function forgotPassword()
    {
        return view('forgot-password.forgot-password-get');
    }

    public function forgotPasswordPost(Request $request)
    {
        $count = User::where('email', '=', $request->email)->count();

        if ($count > 0) {
            $user = User::where('email', '=', $request->email)->first();
            $user->remember_token = Str::random(50);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Password has been reset!');
        } else {
            return redirect()->back()->with('error', 'Email not found, please try again!');
        }

    }

    public function resetPasswordGet()
    {
        return view('forgot-password.forgot-password-get');
    }

    public function resetPasswordPost(Request $request, $token)
    {
        $user = User::where('password_reset_token', $token)->first();

        // Verifică dacă utilizatorul există și token-ul nu a expirat
        if ($user && $user->password_reset_expiry > now()) {
            // Validare și actualizare a parolei
            $request->validate([
                'new_password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8|same:new_password',
            ]);

            // Actualizează parola utilizatorului în baza de date
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Șterge token-ul și data de expirare a resetării parolei
            $user->password_reset_token = null;
            $user->password_reset_expiry = null;
            $user->save();

            // Autentifică utilizatorul
            Auth::login($user);

            // Redirecționează utilizatorul către pagina dorită după actualizarea parolei
            return redirect()->route('home')->with('success', 'Your password has been updated successfully!');
        }

        // Dacă token-ul nu este valid sau a expirat, redirecționează utilizatorul către pagina de resetare a parolei cu un mesaj de eroare
        return redirect()->route('password.request')->with('error', 'Invalid or expired password reset token.');

    }
}
