<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsightRequest extends FormRequest
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
            'coin_id' => 'required',
            'excerpt' => 'string',
            'description' => 'string'
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
            'coin_id.required' => 'Please select a coin',
        ];
    }
}
