<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\UserMention */
class UserMentionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

        ];
    }
}
