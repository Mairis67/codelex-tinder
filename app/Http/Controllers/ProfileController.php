<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user
        ]);
    }

    public function editProfile(): View
    {
        $user = Auth::user();

        return view('profile.edit-profile', [
            'user' => $user
        ]);
    }

    public function editSettings(): View
    {
        $user = Auth::user();

        return view('profile.edit-settings', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $userProfile = $user->profile;


        $userProfile->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'age' => $request->get('age'),
            'description' => $request->get('description'),
        ]);

        return redirect('/profile');
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $userSettings = $user->settings;

        $userSettings->update([
            'search_male' => $request->get('search_male'),
            'search_female' => $request->get('search_female')
        ]);

        return redirect('/profile');
    }
}
