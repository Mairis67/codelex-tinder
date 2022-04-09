<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\UserPicture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index()
    {
        return view('profile.upload');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($request->hasFile('picture')) {

            $request->validate([
                'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg']
            ]);

            $request->file('picture')->store('pictures', 'public');

            $path = $request->file('picture')->hashName();

            $picture = new UserPicture([
                'user_id' => $user->id,
                "path" => $path
            ]);
            $picture->save();
        }


        return redirect('/profile');
    }
}
