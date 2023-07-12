<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\User;

class PostObserver
{
    public function created(Post $post): void
    {
        preg_match_all('(\@(?P<username>[a-zA-Z0-9\-\_]+))', $post->body, $mentions, PREG_SET_ORDER);


        $post->mentions()->sync(
            User::whereIn('username', array_column($mentions, 'username'))->pluck('id')
        );
    }
}
