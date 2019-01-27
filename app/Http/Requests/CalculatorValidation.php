<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatorValidation extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'numbers' => 'required|array|min:2',
            'operation' => 'required|in:addition,subtraction,multipication,division'
        ];
    }

    /**
     * Oveeride default msg with the custom message.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'numbers.min' => 'Please enter all the number fields.',
            'numbers.required' => 'Please enter the required number fields.',
            'operation.required' => 'Please provide the operation you want to perform on the calculation.',
            'operation.in' => 'Operation can be either addition, subtraction, multipication, division.',
        ];
    }
}
