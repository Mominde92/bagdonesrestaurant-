<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_locale',
        'image',
        'parent_id',
        'cover_image',
        'slider_web'
    ];


    public function get_childern()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function get_parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }

    public function items(){
        return $this->hasMany(Item::class,'sub_category_id');
    }

}
