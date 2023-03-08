<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'appearance_number', 'offer_id', 'category_id' , 'sub_category_id', 'item_id' , 'content_type_id'
    ];
    // protected $fillable = [
    //     'layout', 'appearance', 'offer_id', 'category_id' , 'sub_category_id', 'item_id' , 'content_type_id'
    // ];



    public function content_type(){
        return $this->belongsTo(Content_type::class,'content_type_id');
    }

    public function subCategory(){
        return $this->belongsTo(Category::class , 'sub_category_id');
    }
    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function appearance(){
        return $this->belongsTo(Appearance::class, 'appearance_number');
    }

}
