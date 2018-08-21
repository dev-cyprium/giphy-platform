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
        return redirect('/');
    }

    public function index(GiphyService $service)
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(5);
        foreach($posts as $post) {
            $post->giphy = $service->getByID($post->giphy_id);
        }
        return view("posts", compact('posts'));
    }

    public function delete($giphy_id)
    {
        $post = Post::where('giphy_id', $giphy_id)->first();
        $post->delete();
        return redirect('/');
    }
}
