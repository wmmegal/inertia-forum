<?php

namespace App\Http\Controllers;


use App\Models\UserMention;
use Illuminate\Http\Request;

class UserMentionController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'body' => UserMention::search($request->search)->take(10)->get()->pluck('name', 'username')
        ]);

    }
}
