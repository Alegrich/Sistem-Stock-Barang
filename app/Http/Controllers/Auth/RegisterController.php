<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //menampilkan registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    //proses registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);



        $data['name'] = $request->name;
        $data['email'] = $request->email;

        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if(!$user){
            return redirect()->back()->withErrors(['name' => 'Cek informasi anda kembali']);
        }
        return  redirect()->route('login');
    }
}
