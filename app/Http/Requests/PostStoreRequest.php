<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required']
        ];
    }

    public function authorize(): bool
    {
        return auth()->user()->can('reply', $this->discussion);
    }
}
