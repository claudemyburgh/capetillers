<?php

namespace App\Http\Requests\Email;

use Illuminate\Foundation\Http\FormRequest;
use LVR\Phone\Phone;

class ProductContactFormRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:60',
            'email' => 'required|string|email',
            'phone' => ['required', new Phone],
            'message_body' => 'required|string|min:10'
        ];
    }
}
