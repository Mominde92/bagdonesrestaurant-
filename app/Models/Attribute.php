<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_locale',
        'description',
        'description_locale',
    ];




    public function entries(){
        return $this->hasMany(Attribute_entry::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class , AttributeItem::class);
    }

    public function getByLang($lang){
        $data = [
            'id'=>$this->id,
            'name'=> $lang == 'en' ? $this->name : $this->name_locale,           
            'entries'=> $this->getEntriesByLang($lang),           
            
        ];
        return $data;

    }

    public function  getEntriesByLang($lang){
        $result = [];
        foreach($this->entries as $entry){
            $data  = $entry->getByLang($lang);
            array_push($result ,$data  );
        }

        return $result;
    }
}
