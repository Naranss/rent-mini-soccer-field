<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'max:15'],
            'role' => ['required', 'in:CUSTOMER,OWNER'],
        ]);

        // dd($validatedData);
        $data = [
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'phone_number' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role']
        ];


        try {
            $user = User::create($data);
            // Auth::login($user);
            return redirect()->route('login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->route('register')->with('failed', 'Failed to create user');
        }
    }
}
