<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    private User $user;
    private User $otherUser;

    public function __construct(User $user, User $otherUser)
    {
        $this->user = $user;
        $this->otherUser = $otherUser;
    }


    public function build()
    {
        return $this
            ->subject('You have a new match')
            ->view('emails.match-email', [
            'user' => $this->user,
            'userProfile' => $this->user->profile,
            'otherUser' => $this->otherUser,
            'otherUserProfile' => $this->otherUser->profile
        ]);
    }
}
