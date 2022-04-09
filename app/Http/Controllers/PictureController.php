<?php

namespace App\Http\Controllers;

use App\Models\Picture;
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

        $path = $request->file('picture')->getClientOriginalName();

        $request->file('picture')->store('pictures', 'public');

        Picture::create([
           'user_id' => $user->id,
           'path' => $path
        ]);

        return redirect()->back();
    }
}
