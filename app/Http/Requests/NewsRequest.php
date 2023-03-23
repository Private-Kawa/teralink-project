<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'news.title' => 'required|string|max:100',
            'news.date' => 'required|date|max:20',
            'news.content' => 'required|string|max:10000',
        ];
    }
}
