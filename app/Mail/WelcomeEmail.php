<?php

namespace App\Mail;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private User $user;
    private UserProfile $userProfile;

    public function __construct(User $user, UserProfile $userProfile)
    {
        $this->user = $user;
        $this->userProfile = $userProfile;
    }

    public function build()
    {
        return $this
            ->subject('New Account Created ' . $this->userProfile->name)
            ->view('emails.welcome-email');
    }
}
