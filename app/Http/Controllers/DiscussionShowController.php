<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Discussion;
use App\Models\Post;

class DiscussionShowController extends Controller
{
    public function __invoke(Discussion $discussion)
    {
        $discussion->load('topic');
        $discussion->loadCount('replies');

        return inertia()->render('Forum/Show', [
            'discussion' => $discussion,
            'posts' => PostResource::collection(Post::whereBelongsTo($discussion)
                ->with(['user', 'discussion'])
                ->oldest()
                ->paginate(10)
            )
        ]);
    }
}
