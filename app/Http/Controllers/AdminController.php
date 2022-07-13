<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function login(Request $request)
     {
          return view('login');
     }
     public function authentication(Request $request)
     {
          $validated = $request->validate([
               'email' => 'required|email',
               'password' => 'required',
          ]);
          if (Auth::attempt([
               "email" => $request->email,
               "password" => $request->password,
          ])) {
               return redirect()->route('/');
          }
          return back()->withErrors('Invalid Password/ Email');
     }
}
