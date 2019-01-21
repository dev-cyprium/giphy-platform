<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post) 
    {
        $comment = $post->comments()->create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
        return response(['message' => 'Successfully made a comment'])->header('Content-Type', 'application/json');
    }
}
