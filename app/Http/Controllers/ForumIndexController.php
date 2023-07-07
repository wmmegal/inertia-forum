<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscussionResource;
use App\Models\Discussion;
use Illuminate\Http\Request;

class ForumIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        return inertia()
            ->render('Forum/Index', [
                'discussions' => DiscussionResource::collection(
                    Discussion::with(['topic', 'post', 'latestPost.user', 'participants'])
                        ->withCount('replies')
                        ->orderByPinned()
                        ->orderByLastPost()
                        ->paginate(5)
                )
            ]);
    }
}
