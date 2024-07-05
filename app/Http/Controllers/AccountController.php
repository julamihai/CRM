<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }
    public function editName()
    {
        return view('account.name');
    }
    public function updateName(Request $request)
    {
        $request->validate(['new_name' => 'required|string|max:255']);
        $user = $request->user();
        $user->name = $request->new_name;

        if ($request->name === $request->conf_name){
            $user->save();
        }else{
            return redirect()->route('editName')->with('error','The names does not match!');
        }
        return redirect()->route('account')->with('success','Name changed successfully!');
    }
    public function editEmail()
    {
        return view('account.email');
    }
    public function updateEmail(Request $request)
    {
        $request->validate(['new_email' => 'required|string|email|max:255|unique:users,email,'.$request->user()->id]);
        $user = $request->user();
        $user->email = $request->new_email;
        if ($request->new_email === $request->conf_email){
            $user->save();
        }else{
            return redirect()->route('editEmail')->with('error','The emails does not match!');
        }
        return redirect()->route('account')->with('success','Email changed successfully!');
    }
    public function editPassword()
    {
        return view('account.password');
    }
    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate(['new_password' => 'required|string|min:8']);

        $user->password = bcrypt($request->new_password);
        if ($user->new_password === $request->confirm_password){
            $user->save();
            return redirect()->route('account')->with('success','Password changed successfully!');
        }else{
            return redirect()->route('editPassword')->with('error','The passwords does not match!');
        }
    }
}
