<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_type extends Model
{
    use HasFactory;
    protected $fillable = ['name'];



    public function appearances(){
        return $this->hasMany(Appearance::class);
    }


}
