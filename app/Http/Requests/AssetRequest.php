<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Api\FormRequestApi;


class AssetRequest extends FormRequestApi
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
            'type' => 'required|min:3|max:255',
            'serial_number' => 'required|max:255',
            'description' => 'required|max:255',
            'fixed' => 'required|boolean',
            'picture_path' => 'required|max:255',
            'purchase_date' => 'required|date',
            'start_use_date' => 'required|date',
            'purchase_price' => 'required|numeric',
            'warranty_expiry_date' => 'required|date',
            'degradation' => 'required|numeric',
            'current_value' => 'required|numeric',
            'location' => 'required|max:255',
        ];
    }
}
