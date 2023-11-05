<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {

        return redirect('/productsLogin');
    }

    public function quickCreateUser()
    {
        User::create([
            'rollID' => 'admin', // Replace with the user's name
            'email' => 'admin@gmail.com', // Replace with the user's email
            'username' => 'adminnistrator',
            'password' => bcrypt('123456'), // Replace 'password' with the user's password (hashed)
        ]);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = Auth::user();
        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công
            if (Auth::user()->rollID === 'admin') {
                return redirect('/homeAdmin');
            } elseif (Auth::user()->rollID === 'user') {
                return redirect('/homeUser');
            }
            
            $request->session()->put('user', $user);
        }

        // Đăng nhập thất bại
        return redirect('/productsLogin')->with('error', 'Sai email hoặc mật khẩu');
    }

    // public function showRegistrationForm()
    // {
    //     return view('register');
    // }

    public function register(Request $request)
    {
        try {
            // Validate user input
            $this->validate($request, [
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // Log the user in after registration (optional)
            // auth()->login($user);

            // Redirect to a page after registration (e.g., home page)

            // Redirect to login page with success message
            return redirect('/productsLogin')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        } catch (\Exception $e) {
            dd($e);
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/productsLogin');
    }
}
