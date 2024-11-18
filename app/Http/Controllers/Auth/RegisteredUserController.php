<?php

namespace App\Http\Controllers\Auth;

use App\AppLpse;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_id' => 2,
        ]);

        // Tambah User ID di Profile
        $admin = User::where('group_id', 1)->first();

        $now = new Carbon();
        $now->addDays(intval(AppLpse::setting('masa_percobaan')));

        UserProfile::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            //Tambah hari
            'masa_berlaku' => Carbon::parse($now)->format('Y-M-d 00:00:00'),
            'upline' => $request->cookie('upline', $admin->username),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
