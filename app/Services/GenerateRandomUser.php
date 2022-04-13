<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserSettings;

class GenerateRandomUser
{
    public function getUser($user, UserSettings $userSettings): ?User
    {
        if ($userSettings->search_male == 1) {
            return User::inRandomOrder()
                ->filterSettings('male', $userSettings->user_id)
                ->filterNotSelected($user->id)
                ->first();

        } elseif ($userSettings->search_female == 1) {
            return User::inRandomOrder()
                ->filterSettings('female', $userSettings->user_id)
                ->filterNotSelected($user->id)
                ->first();
        } else {
            return null;
        }
    }
}
