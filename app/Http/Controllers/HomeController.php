<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home()
    {
        return Inertia::render("Home", []);
    }

    public function settings()
    {
        return Inertia::render("Settings",[
            "name" => "looooooooooooool"
        ]);
    }

    public function users(Request $request)
    {
        return Inertia::render("Users", [
            "users" => User::when($request->search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($user) => [
                    "id" => $user->id,
                    "name" => $user->name,
                    "email" => $user->email,
                ]),

            "filters" => $request->only(['search']),

            "can" => [
                'create_user' => Auth::user()->can('create', [User::class]),
            ]
        ]);
    }

    public function userCreate()
    {
        return Inertia::render("CreateUser");
    }

    public function userInsert(Request $request)
    {
        $request->validate([
            "full_name" => "required|min:3",
            "email" => "required|email|unique:Users,email",
            "password" => "required"
        ]);

        User::create([
            "name" => $request->full_name,
            "email" => $request->email,
            "password" => $request->password,
        ]);

        return to_route('users.create');
    }

    public function login()
    {
        //return Inertia::render("Auth/Login");
        return Inertia::render('Home');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return Inertia::render("Home", [
            "auth" => Auth::user(),
        ]);
        /*
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        */
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
