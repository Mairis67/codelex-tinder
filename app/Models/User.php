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

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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
            'user_two', 'auth_user');
    }

    public function match(User $otherUser)
    {
        $userMatched = $this->belongsToMany(User::class, 'matches',
            'auth_user', 'user_two')
            ->where('auth_user', '=', $this->id)
            ->where('user_two', '=', $otherUser->id)->getResults();

        $matchedUser = $this->belongsToMany(User::class, 'matches',
            'user_two', 'auth_user')
            ->where('user_two', '=', $this->id)
            ->where('auth_user', '=', $otherUser->id)->getResults();

        if (isset($userMatched->first()->attributes['id']) && isset($matchedUser->first()->attributes['id'])) {
            return $otherUser;
        } else {
            return null;
        }
    }

    public function scopeFilterSettings($query, $gender, $id)
    {
        return $query->whereHas('profile', function ($query) use ($gender, $id) {
            $query
                ->where('gender', $gender)
                ->where('user_id', '!=', $id);
        });
    }

    public function scopeFilterNotSelected($query, $id)
    {
        return $query->whereDoesntHave('userLiked', function ($query) use ($id) {
            $query->where('auth_user', $id);
        })
            ->whereDoesntHave('dislikes', function ($query) use ($id) {
                $query->where('auth_user', $id);
            });
    }

    public function scopeMatches($query, $id)
    {
        return $query->whereHas('userLiked', function ($query) use ($id) {
            $query->where('auth_user', $id);
        })
            ->whereHas('likedUser', function ($query) use ($id) {
                $query->where('user_two', $id);
            })
            ->whereDoesntHave('dislikes', function ($query) use ($id) {
                $query->where('auth_user', $id);
            });
    }

}
