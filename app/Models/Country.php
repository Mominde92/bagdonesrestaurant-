<?php

namespace App\Models;

use Cities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{

    use SoftDeletes;
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'iso', 'name', 'name_local', 'phone', 'image'
    ];

    /**
     * Get the cities for the country.
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
