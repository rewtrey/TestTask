<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {

        $validated = $request->validated();


        /** @var User $user */
        $user = User::query()->where('email', $validated['email'])->first();

        if(auth()->attempt(array('email' => $validated['email'], 'password' => $validated['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('handleAdmin');
            }else{
                return redirect()->route('blogs.index');
            }
        }
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return view('auth.errorLogin');
        }

        Auth::login($user);

        return redirect('blogs.index');
    }





    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $user = new User();
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->name = $validated['name'];
        $user->save();

        $auth = Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        return redirect('/blogs');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/blogs');
    }
}
