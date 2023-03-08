<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AreaUpdateRequest extends FormRequest
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
            'name' => ['required', Rule::unique('areas', 'name')->ignore($area), 'max:50'],
            'name_local' => [Rule::unique('areas', 'name_local')->ignore($area), 'max:50'],
            'city_id' => ['required'],
        ];
    }
}
