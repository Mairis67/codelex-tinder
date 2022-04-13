<?php

namespace App\Http\Controllers;

use App\Models\UserPicture;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PictureController extends Controller
{
    public function index()
    {
        return view('profile.upload');
    }

    public function store(Request $request): RedirectResponse
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

        return redirect('/profile');
    }
}
