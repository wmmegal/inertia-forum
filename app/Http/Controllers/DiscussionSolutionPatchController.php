<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscussionSolutionRequest;
use App\Models\Discussion;
use App\Models\Post;

class DiscussionSolutionPatchController extends Controller
{
    public function __invoke(DiscussionSolutionRequest $request, Discussion $discussion)
    {
        $discussion->solution()->associate(Post::find($request->post_id));
        $discussion->save();

        return back();
    }
}
