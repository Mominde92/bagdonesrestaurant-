<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaStore extends Model
{
    use HasFactory;
    protected $table = "area_store";

    protected $fillable = ['area_id','store_id'] ;
    
}
