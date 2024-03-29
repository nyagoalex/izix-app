<?php

namespace App\Domain\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' =>  ['required', 'string', 'max:150'],
            'author' =>  ['required', 'string', 'max:150'],
            'content' =>  ['required', 'string'],
        ];
    }
}
