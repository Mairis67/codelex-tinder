<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
            'user' => $user,
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

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:3', 'max:255'],
            'age' => ['required', 'int', 'min:18', 'max:100'],
            'description' => ['required', 'min:10', 'max:500'],
        ]);

        $userProfile->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'age' => $request->age,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $userSettings = $user->settings;

        $request->validate([
            'search_male' => ['required_unless:search_female,1'],
            'search_female' => ['required_unless:search_male,1']
        ]);

        $userSettings->update([
            'search_male' => $request->search_male,
            'search_female' => $request->search_female,
        ]);

        return redirect()->back();
    }
}
