<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Post extends Model
{
    protected $fillable = ["giphy_id", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
