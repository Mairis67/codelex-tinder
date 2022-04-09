<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'age',
        'gender',
        'profile_picture',
        'description'
    ];

    protected $table = 'user_profiles';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    public function getPicture()
//    {
//        if($this->profile_picture == null)
//        {
//            return Storage::url('/picture/default.png');
//        }
//
//        return Storage::url($this->profile_picture);
//    }
}
