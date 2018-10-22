<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Post extends Model
{
    protected $fillable = ["giphy_id", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment(User $user, string $text)
    {
        $newComment = $this->comments()->make();
        $newComment->user_id = $user->id;
        $newComment->text = $text;
        $newComment->save();
    }
}
