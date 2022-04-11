<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getPicture()
    {
        return Storage::url($this->path);
    }
}
