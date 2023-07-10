<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;
use Spatie\LaravelMarkdown\MarkdownRenderer;

/** @mixin \App\Models\Post */
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => PublicUserResource::make($this->whenLoaded('user')),
            'discussion' => DiscussionResource::make($this->whenLoaded('discussion')),
            'body' => $this->body,
            'body_markdown' => app(MarkdownRenderer::class)->toHtml($this->body),
            'created_at' => DateTimeResource::make($this->created_at),
            'body_preview' => Str::limit($this->body, 200),
            'user_can' => [
                'edit' => auth()->user()?->can('edit', $this->resource),
                'delete' => auth()->user()?->can('delete', $this->resource),
            ]
        ];
    }
}
