<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'user_id', 'city_id', 'area_id','street_name', 'bulding_number', 'floor_number','note', 'longitude', 'latitude', 'google_maps_link', 'current_address'
    ];
}
