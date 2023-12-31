<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())){
            $user = User::where('email', $request->validated()['email'])->first();
//            $user = $this->userRepository->where('email', $request->validated()['email'])->first();
            Auth::login($user, true);
            return redirect('dashboard');
        }
        return back()->withErrors([
            'password' => ['پسوردت اشتباهه']
        ]);
    }

    public function showlogin()
    {
        return view('auth.login');
    }
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->create($request->validated());
       Auth::login($user, true);
       return redirect('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
