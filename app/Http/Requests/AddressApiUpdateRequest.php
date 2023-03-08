<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressApiUpdateRequest extends FormRequest
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
            'user_id' => 'required',
            'city_id' => 'required',
            'area_id' => 'required',
            'street_name' => 'required',
            'bulding_number' => 'required',
            'floor_number' => 'required',
            'note' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'google_maps_link' => 'required',
            'current_address' => 'required'
        ];
    }
}
