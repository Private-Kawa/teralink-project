<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'events.title' => 'required|string|max:100',
            'events.date' => 'required|date|max:20',
            'events.capacity' => 'required|integer|max:4000',
            'events.content' => 'required|string|max:10000',
        ];

    }
}
