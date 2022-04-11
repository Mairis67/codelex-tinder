<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserSettings;

class GenerateRandomUser
{
    public function getUser(UserSettings $userSettings): ?User
    {
        if ($userSettings->search_male == 1) {
            return User::all()->random();
//                ->searchWithSettings(
//                    'male',
//                    $userSettings->user_id
//                );
        } elseif ($userSettings->search_female == 1) {
            return User::all()->random();
//                ->searchWithSettings(
//                    'female',
//                    $userSettings->user_id
//                );
        } else {
            return null;
        }
    }
}
