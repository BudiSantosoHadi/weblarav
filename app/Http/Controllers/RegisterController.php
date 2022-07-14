<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index',[
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
      $sudahvalid = $request->validate([
        'name' => 'required|max:225', //cara pertama
        'username' => ['required', 'min:3', 'max:225', 'unique:users'], // cara kedua
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255'
       ]);

    //    $sudahvalid['password'] = bcrypt($sudahvalid['password']); // cara pertama
       // ini supaya password nya terennkripsi

       // cara ke2
       $sudahvalid['password'] = Hash::make($sudahvalid['password']);

       User::create($sudahvalid);

    //    $request->session()->flash('success', 'Registration successfull! Please login'); // ada cara lebih mudahnya di masukin di dalam bawah ini

       return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
