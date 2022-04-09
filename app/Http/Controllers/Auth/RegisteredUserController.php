<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserSettings;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['required', 'int', 'min:18', 'max:100'],
            'gender' => ['required'],
            'description' => ['required', 'min:10', 'max:255'],
            'search_male' => ['required_unless:search_female,1'],
            'search_female' => ['required_unless:search_male,1']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $userProfile = UserProfile::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'age' => $request->age,
            'gender' => $request->gender,
            'description' => $request->description
        ]);

        (isset($request->search_male)) ? $searchMale = 1 : $searchMale = 0;
        (isset($request->search_female)) ? $searchFemale = 1 : $searchFemale = 0;

        UserSettings::create([
            'user_id' => $user->id,
            'search_male' => $searchMale,
            'search_female' => $searchFemale
        ]);

        event(new Registered($user));

        Auth::login($user);

        Mail::to($user->email)->queue(new WelcomeEmail($user, $userProfile));

        return redirect(RouteServiceProvider::HOME);
    }
}
