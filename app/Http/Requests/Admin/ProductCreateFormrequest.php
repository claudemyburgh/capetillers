<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;


class ProductCreateFormrequest extends FormRequest
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
            'excerpt' => 'nullable|string|max:250',
            'content' => 'nullable',
            'price' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/'],
            'salesprice' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/'],
        ];
    }
}
