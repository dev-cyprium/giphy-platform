<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function store(Request $request)
    {
        
        Post::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
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
        if(Auth::user()->can('delete', $post)) {
            $post->delete();
            return redirect('/');
        }
        throw ValidationException::withMessages(["pop_message" => "Can't delete that post"]);
    }
}
