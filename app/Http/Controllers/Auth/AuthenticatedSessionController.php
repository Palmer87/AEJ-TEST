<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use PhpParser\Node\Stmt\ElseIf_;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'promoteur') {
        return redirect()->route('promoteur.dashboard');
    } elseif ($user->role === 'gestionnaire') {
        return redirect()->route('gestionnaire.dashboard');
    } elseif($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }else {
        return redirect()->route('home')->with('error', 'Rôle non reconnu.');
    }
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
