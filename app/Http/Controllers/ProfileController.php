<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->join('user_settings', 'users.id', '=', 'user_settings.user_id')
//            ->join('pictures', 'users.id', '=', 'pictures.user_id')
            ->get(['users.*', 'user_profiles.*', 'user_settings.*']);

        return view('profile.index', compact('data'));
    }

}
