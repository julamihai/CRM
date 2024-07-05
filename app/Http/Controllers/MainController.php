<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function getRegister()
    {
        return view('./auth/register');
    }
    public function getLogin()
    {
        return view('./auth/login');
    }
    public function getDashboard()
    {
        return view('./dashboard/dashboard');
    }
    public function getAccount()
    {
        return view('./account/index');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    public function editName()
    {
        return view('./account/name');
    }
    public function editEmail()
    {
        return view('./account/email');
    }
    public function editPassword()
    {
        return view('./account/password');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withErrors('password-confirmation', 'The password does not match!');
        }
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);
        auth()->login($user);

        return redirect()->route('dashboard')->with('success','Registered successfully!');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            return redirect()->route('dashboard')->with('success','Login Successfully!');
        }else{
            return redirect()->route('login')->with('error','Email or password is incorrect! Try again!');
        }
    }
    public function updateName(Request $request)
    {
        $request->validate([
            'new_name' => 'required|string|max:255'
        ]);

        $user = $request->user();
        $user->name = $request->new_name;

        if ($request->new_name === $request->conf_name){
            $user->save();
        }else{
            return redirect()->route('editName')->with('error','The names does not match!');
        }
        return redirect()->route('account')->with('success','Name changed successfully!');
    }
    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|string|email|max:255|unique:users,email,'.$request->user()->id,
            'conf_email' => 'required|same:new_email',
        ]);

        $user = $request->user();
        $user->email = $request->new_email;
        $user->save();

        return redirect()->route('account')->with('success', 'Email changed successfully!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        else if($request->new_password !== $request->confirm_password) {
            return redirect()->back()->with('password', 'The password does not match!');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->route('account')->with('password', 'Password changed successfully!');
    }
    public function deleteAccount()
    {
        $user = Auth::user();
        if ($user) {
            $user->delete();
            Auth::logout();
            return redirect()->route('login')->with('account', 'Your account has been deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Unable to delete account.');
        }
    }
}

