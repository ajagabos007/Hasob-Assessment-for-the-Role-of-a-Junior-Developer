<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Api\FormRequestApi;

class AssetAssignmentRequest extends FormRequestApi
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
            'asset_id' => 'required|numeric|unique:asset_assignments',
            'assignment_date' => 'required|date',
            'status' => 'required|max:255',
            'is_due' => 'required|boolean',
            'due_date' => 'required|date',
            'assigned_user_id' => 'required|numeric',
            'assigned_by' => 'required',
        ];
    }
}
