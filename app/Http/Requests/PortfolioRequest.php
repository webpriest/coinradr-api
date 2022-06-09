<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'value_of_asset' => 'required|numeric'
        ];
    }

    /**
     * Return error message.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'coin_id.required' => 'Please choose a coin',
            'value_of_asset.required' => 'Please enter an asset value that is above zero',
            'value_of_asset.numeric' => 'Please enter a number'
        ];
    }
}
