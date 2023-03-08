<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompulsoryChoiceItem extends Model
{
    use HasFactory;
    protected $table = "compulsory_choice_item";

    protected $fillable = ['compulsory_choice_id','item_id'] ;
    
}
