<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name', 'name_local', 'country_id' , 
    ];

    /**
     * Get the country for this city.
     */
    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }

     /**
     * Get the areas for this city.
     */
    public function areas()
    {
        return $this->hasMany(Area::class);
    }

}
