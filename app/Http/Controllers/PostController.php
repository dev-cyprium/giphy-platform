<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect("/");
    }

    public function index(GiphyService $service)
    {
        $posts = Post::all();
        $result = [];
        foreach($posts as $post) {
            $result[] = $service->getByID($post->giphy_id);
        }

        return view("posts", compact('result'));
    }
}
