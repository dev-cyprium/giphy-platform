<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GiphyService;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    private const PER_PAGE = 7;

    /*
        Handled by API call

        TODO: Add validation!!
    */
    public function store(Request $request)
    {
        return Post::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
    }

    public function index(GiphyService $service)
    {
        $posts = Post::with(['user', 'comments'])->orderBy('created_at', 'desc')->paginate(self::PER_PAGE);
        $this->addGiphyToPosts($posts, $service);
        $this->calculateDateString($posts);
        return view("posts", compact('posts'));
    }

    /*
        Handled by API call
    */
    public function delete($giphy_id)
    {
        $post = Post::where('giphy_id', $giphy_id)->first();
        if(Auth::user()->can('delete', $post)) {
            return $post->delete();
        }
        throw ValidationException::withMessages(["pop_message" => "Can't delete that post"]);
    }

    public function user(User $user, GiphyService $service)
    {
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(self::PER_PAGE);
        $noLinkName = true;
        $this->addGiphyToPosts($posts, $service);

        return view("posts", compact('posts', 'noLinkName'));
    }

    private function addGiphyToPosts($posts, $service)
    {
        foreach($posts as $post) {
            $post->giphy = $service->getByID($post->giphy_id);
        }
    }

    private function calculateDateString($posts) {
        foreach($posts as $post) {
            $post->display_time = $post->created_at->diffForHumans();
        }
    }
}
