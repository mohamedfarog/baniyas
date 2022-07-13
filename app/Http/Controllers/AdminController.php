<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('login');
   }
}
