<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeItem extends Model
{
    use HasFactory;
    protected $table = "attribute_item";

    protected $fillable = ['attribute_id','item_id'] ;
    
}
