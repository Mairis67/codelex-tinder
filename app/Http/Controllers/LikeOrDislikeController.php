<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\LikeOrDislikeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeOrDislikeController extends Controller
{
    private LikeOrDislikeService $likeOrDislikeService;

    public function __construct(LikeOrDislikeService $likeOrDislikeService)
    {
        $this->likeOrDislikeService = $likeOrDislikeService;
    }

    public function like(int $id): RedirectResponse
    {
        $user = Auth::user();
        $otherUser = User::find($id);

        $this->likeOrDislikeService->like($user, $otherUser);

        return redirect('/home');
    }

    public function dislike(int $id): RedirectResponse
    {
        $user = Auth::user();
        $otherUser = User::find($id);

        $this->likeOrDislikeService->dislike($user, $otherUser);

        return redirect('/home');
    }
}
