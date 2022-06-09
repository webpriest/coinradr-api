<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignalRequest extends FormRequest
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
            'pair' => 'required',
            'duration' => 'required',
            'price' => 'required',
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
            'pair.required' => 'Enter a trading pair',
            'duration.required' => 'Indicate a duration',
            'price.required' => 'Enter a price',
        ];
    }
}
