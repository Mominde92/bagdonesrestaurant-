<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleChoiceItem extends Model
{
    use HasFactory;
    protected $table = "item_multiple_choice";

    protected $fillable = ['multiple_choice_id','item_id'] ;
    
}
