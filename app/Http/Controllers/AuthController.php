<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginPage(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'email',
            'password' => 'required',
        ]);

        $userModel = User::where('email', $request->input('email'))
            ->where('status', UserStatus::ACTIVE->value)
            // ->where('type', UserType::INTERNAL())
            ->first();

        if (!$userModel) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with([
                    '_status' => 'error',
                    '_msg' => 'No account found for this email!'
                ]);
        }

        if (!Hash::check($request->string('password'), $userModel->password)) {
            return redirect()
                ->back()
                ->with([
                    '_status' => 'error',
                    '_msg' => 'Wrong password, please try again!'
                ]);
        }

        Auth::login($userModel);
//        $request->session()->regenerate();

        return redirect()->route('home');
    }


    public function signupPage(): View
    {
        return view('auth.signup');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->route('auth.login.page');
    }
}
