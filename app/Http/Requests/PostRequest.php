<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'caption' => 'required',
            'content' => 'required'
        ];
    }

    /**
     * Return error messages.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'caption.required' => 'Please enter a caption',
            'content.required' => 'The news content is required'
        ];
    }
}
