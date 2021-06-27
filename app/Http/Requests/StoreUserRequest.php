<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Api\FormRequestApi;

class StoreUserRequest extends FormRequestApi
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
            'first_name' =>  'required|string|max:255',
            'middle_name' =>  'nullable|string|max:255',
            'last_name' =>  'required|string|max:255',
            'email' => 'required:email',
            'phone_number' =>  'required|numeric',
            'password' => 'required|alpha_num|min:8|confirmed',
            'password_confirmation' => 'required|alpha_num',
        ];
    }
}
