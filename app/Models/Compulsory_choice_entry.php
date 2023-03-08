<?php

namespace App\Models;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compulsory_choice_entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_locale',
        'compulsory_choice_id'
    ];




    public function Compulsory_choice(){
        return $this->belongsTo(Compulsory_choice::class, 'compulsory_choice_id');
    }

    public function getByLang($lang){
        $data = [
            'id'=>$this->id,
            'name'=> $lang == 'en' ? $this->name : $this->name_locale,           
            'compulsory_choice_id'=> $this->compulsory_choice_id ,
        ];
        return $data;

    }
}
