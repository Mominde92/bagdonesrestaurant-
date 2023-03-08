<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUpdateRequest extends FormRequest
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
            'name_locale' => ['required', 'max:255'],
            'name' => ['required', 'max:255'],
            'slogan' => ['required', 'max:255'],
            'slogan_locale' => ['required', 'max:255'],
            'location_text' => ['required', 'max:255'],
            'location_text_locale' => ['required', 'max:255'],
            'phone_number' => ['required', 'max:255'],
            'delivery_time_range' => ['required', 'max:255'],
            'google_map_link' => ['required'],
        ];
    }
}
