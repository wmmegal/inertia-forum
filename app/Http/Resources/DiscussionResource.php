<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Discussion */
class DiscussionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'topic' => TopicResource::make($this->whenLoaded('topic')),
            'replies_count' => $this->replies_count,
            'post' => PostResource::make($this->whenLoaded('post')),
            'latest_post' => PostResource::make($this->whenLoaded('latestPost')),
            'solution' => PostResource::make($this->whenLoaded('solution')),
            'participants' => PublicUserResource::collection($this->whenLoaded('participants')),
            'is_pinned' => $this->isPinned(),
            'user_can' => [
                'reply' => auth()->user()?->can('reply', $this->resource),
                'delete' => auth()->user()?->can('delete', $this->resource),
                'solve' => auth()->user()?->can('solve', $this->resource),
            ]
        ];
    }
}
