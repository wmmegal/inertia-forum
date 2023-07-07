<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'discussion_id' => ['required', 'integer'],
            'parent_id' => ['required', 'integer'],
            'bodt' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
