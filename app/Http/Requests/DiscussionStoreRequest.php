<?php

namespace App\Http\Requests;

use App\Models\Topic;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscussionStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'topic_id' => ['required', Rule::exists(Topic::class, 'id')],
            'title' => ['required', 'max:255'],
            'body' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
