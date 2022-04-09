<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPicture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path'
    ];

    protected $table = 'user_pictures';

    public function pictures()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
