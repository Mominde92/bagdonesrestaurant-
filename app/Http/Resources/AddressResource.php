<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required'],
            'city_id' => ['required'],
            'area_id' => ['required'],
            'street_name' => ['required'],
            'bulding_number' => ['required'],
            'floor_number' => ['required'],
            'note' => ['required'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'google_maps_link' => ['required'],
            'current_address' => ['required']];
    }
    
}
