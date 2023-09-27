<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function LoginUser(Request $request)
    {

        $credentials = $request->only('nrp', 'password');

        // Retrieve the user by the provided nrp
        $user = User::where('nrp', $credentials['nrp'])->first();

        // Check if the user exists and the provided password matches
        if ($user && $user->password === $credentials['password']) {
            // User is authenticated, log them in
            // Note: This is NOT secure in production. Use proper password encryption like bcrypt.
            auth()->login($user);

            // Redirect the user to the desired location after login
            return redirect('/konsultasi');
        } else {
            // Authentication failed, redirect back to the login page with an error message.
            return redirect()->route('login')->with('error', 'Invalid Nrp or password.');
        }
    }
}
