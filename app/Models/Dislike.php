<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $fillable = [
      'auth_user',
      'user_two'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'auth_user');
    }
}
