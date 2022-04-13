<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private User $user;
    private UserProfile $userProfile;

    public function __construct(User $user, UserProfile $userProfile)
    {
        $this->user = $user;
        $this->userProfile = $userProfile;
    }

    public function handle(): void
    {
        Mail::to($this->user->email)->queue(new WelcomeEmail($this->user, $this->userProfile));
    }
}
