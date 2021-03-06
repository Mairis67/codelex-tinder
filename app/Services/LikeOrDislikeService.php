<?php

namespace App\Services;

use App\Mail\MatchEmail;
use App\Models\Dislike;
use App\Models\Match;
use Illuminate\Support\Facades\Mail;

class LikeOrDislikeService
{
    public function like($user, $otherUser)
    {
        Match::create([
           'auth_user' => $user->id,
           'user_two' => $otherUser->id
        ]);

        if (!$user->match($otherUser) == null) {
            Mail::to($user->email)
                ->queue(new MatchEmail($user, $otherUser));
            Mail::to($otherUser->email)
                ->queue(new MatchEmail($otherUser, $user));
        }
    }

    public function dislike($user, $otherUser)
    {
        Dislike::create([
           'auth_user' => $user->id,
            'user_two' => $otherUser->id
        ]);
    }
}
