<?php

namespace App\Http\Controllers;

use App\Models\UserPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PictureController extends Controller
{
    public function index()
    {
        return view('profile.upload');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($request->hasFile('picture')) {

            $request->validate([
                'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg']
            ]);

            $request->file('picture')->store('pictures', 'public');

            $path = $request->file('picture')->hashName();

            UserPicture::create([
                'user_id' => $user->id,
                "path" => $path
            ]);
        }


//        $request->validate([
//            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg']
//        ]);
//
//        $picture = $request->file('picture');
//        $input['pictureName'] = time() . '.' . $picture->extension();
//
//        $path = public_path('/storage/pictures');
//
//        $pic = Image::make($picture->path());
//
//        $pic->resize(100, 100, function ($constraint) {
//
//            $constraint->aspectRatio();
//
//        })->save($path . '/' . $input['pictureName']);
//
//        $path = public_path('/storage/pictures');
//
//        $a = explode('/', $picture->move($path, $input['pictureName']));



        return redirect('/profile');
    }
}
