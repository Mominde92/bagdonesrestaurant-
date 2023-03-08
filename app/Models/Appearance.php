<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    use HasFactory;
    protected $fillable = [
        'number' , 'content_type_id'
    ];


    public function content_type()
    {
        return $this->belongsTo(Content_type::class , 'content_type_id');
    }
}
