<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'profile' => $request->user()->profile
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateprofile(Request $request)
    {
        $validateData = $request->validate([
            'perusahaan' => 'required',
            'kbli' => '',
            'kata_kunci' => '',
            'whatsapp' => 'numeric|max_digits:13',
            'telegram' => 'numeric',
            'image' => 'image|file|max:1024'
        ]);


        $validateData['kata_kunci'] = Str::replace(', ', ',', Str::replace(' ,', ',', $validateData['kata_kunci']));
        $validateData['kbli'] = Str::replace(', ', ',', Str::replace(' ,', ',', $validateData['kbli']));
        $validateData['notif_whatsapp'] = $request->has('notif_whatsapp') ?  true : false;
        $validateData['notif_telegram'] = $request->has('notif_telegram') ?  true : false;
        $validateData['notif_email'] = $request->has('notif_email') ? true : false;
        $validateData['bank_komisi'] = $request->bank_komisi;
        $validateData['rek_komisi'] = $request->rek_komisi;

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('profile');
        }

        UserProfile::where('user_id', $request->user()->id)->update($validateData);

        return redirect(route('profile.edit'))->with('success', __('global.message.store', ['view' => 'Profile']));
    }
}
