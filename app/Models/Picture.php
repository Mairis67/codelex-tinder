<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'path'
    ];

    protected $table = 'pictures';

//    public static function boot(): void
//    {
//        parent::boot();
//
//        static::deleting(function (Picture $picture) {
//            Storage::delete([
//                Storage::disk('public')->delete($picture->path),
//            ]);
//        });
//    }
//
//    public function getPicture()
//    {
//        if($this->path == null)
//        {
//            return Storage::url('/picture/default.png');
//        }
//
//        return Storage::url($this->path);
//    }
}
