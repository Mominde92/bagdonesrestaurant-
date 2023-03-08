<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderApiCreateRequest extends FormRequest
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
            'city' => ['required'],
            'area' => ['required'],   
            'amount' => ['required'],    
            'tax' => ['required'],        
            'delivery_fee' => ['required'],   
            'total_amount' => ['required'],   
            'street_n' => ['required'],   
            'building_n' => ['required'],   
            'appartment_n' => ['required'], 
            'phone_number' => ['required'], 
            'gps_link' => ['required'], 
            'device_type' => ['required'], 
            'device_token' => ['required'], 
            'customer_note' => ['required']
        ];
    }
}
