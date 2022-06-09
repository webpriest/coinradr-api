<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'title' => 'required|min:5',
            'category_id' => 'required|min:1',
            'content' => 'required|min:50',
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
            'title.min' => 'Enter a title with not less than 5 characters',
            'category_id.min' => 'Choose a category',
            'content.required' => 'Please provide the content of the article',
            'content.min' => 'Enter content with not less than 50 characters',
        ];
    }
}
