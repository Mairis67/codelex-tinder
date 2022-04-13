<?php

namespace App\Http\Controllers;

use App\Services\GenerateRandomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private GenerateRandomUser $generateRandomUser;

    public function __construct(GenerateRandomUser $generateRandomUser)
    {
        $this->generateRandomUser = $generateRandomUser;
    }

    public function index()
    {
        $user = Auth::user();

        $userSettings = $user->settings;

        $otherUser = $this->generateRandomUser->getUser($user, $userSettings);

        return view('home', [
            'otherUser' => $otherUser,
            'user' => $user,
        ]);
    }

}
