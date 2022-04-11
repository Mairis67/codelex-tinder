<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function settings()
    {
        return $this->hasOne(UserSettings::class);
    }

    public function picture()
    {
        return $this->hasMany(UserPicture::class);
    }

    public function userLiked()
    {
        return $this->belongsToMany(User::class, 'matches',
            'user_two', 'auth_user');
    }

    public function likedUser()
    {
        return $this->belongsToMany(User::class, 'matches',
            'auth_user', 'user_two');
    }

    public function dislikes()
    {
        return $this->belongsToMany(User::class, 'dislikes',
            'user_two', 'auth)_user');
    }

    public function match(User $otherUser)
    {
        $userMatched = $this->belongsToMany(User::class, 'matches',
            'auth_user', 'user_two')
            ->where('auth_user', '=', $this->id)
            ->where('user_two', '=', $otherUser->id)->getResults();

        $matchedUser = $this->belongsToMany(User::class, 'matches',
            'user_two', 'auth_user')
            ->where('auth_two', '=', $this->id)
            ->where('auth_user', '=', $otherUser->id)->getResults();

        if (isset($userMatched[0]->attributes['id']) && isset($matchedUser[0]->attributes['id'])) {
            return $otherUser;
        } else {
            return null;
        }
    }

}
