<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => PublicUserResource::make($this->whenLoaded('user')),
            'body' => $this->body,
            'created_at' => DateTimeResource::make($this->created_at),
            'body_preview' => Str::limit($this->body, 200)
        ];
    }
}
