<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'search_male',
        'search_female'
    ];

    protected $table = 'user_settings';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
