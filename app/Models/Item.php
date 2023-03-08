<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Stroe;
// use App\Models\Attribute;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;



class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'store_id',
        'name',
        'name_locale' ,
        'sub_category_id',
        'description',
        'description_locale',
        'price',
        'new_price',
        'main_screen_image',
        'cover_image',
        'slider_web',
        'in_stock', //yes or no
    ];


    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class,'sub_category_id');
    }

    public function images()
    {
        return $this->hasMany(ItemImage::class);
    }


    public function itemAttributes()
    {
        return $this->belongsToMany(Attribute::class, AttributeItem::class);
    }
    public function compulsoryChoices()
    {
        return $this->belongsToMany(Compulsory_choice::class, CompulsoryChoiceItem::class);
    }
    public function multipleChoices()
    {
        return $this->belongsToMany(Multiple_choice::class, MultipleChoiceItem::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class , OrderItems::class);
    }

    public function getByLang($lang)
    {

        $data = [
            'id'=>$this->id,
            'name'=> $lang == 'en' ? $this->name : $this->name_locale,
            'sub_category_id' => $this->sub_category_id,
            'sub_category_name' => $lang == 'en' ? $this->subCategory->name : $this->subCategory->name_locale ,
            'description' => $lang == 'en' ? $this->description : $this->description_locale,
            'price'  =>$this->price,
            'new_price' =>$this->new_price,
            'main_screen_image' =>$this->main_screen_image != null ?  asset('uploads/items/'.$this->main_screen_image) : $this->main_screen_image,
            'cover_image' =>$this->cover_image != null ?  asset('uploads/items/'.$this->cover_image) : $this->cover_image,
            'in_stock'=>$this->in_stock,
            'store' => $this->store->getByLang($lang),
            'attributes' => $this->getAttributesByLang($lang),
            'compulsory_choices' => $this->getCompulsoryChoicesByLang($lang),
            'multiple_choices' => $this->getMultipleChoicesByLang($lang),
        ];

        return $data;


    }



    public function  getCompulsoryChoicesByLang($lang){
        $result=[];
        foreach($this->compulsoryChoices as $compulsoryChoice){
            $data  = $compulsoryChoice->getByLang($lang);
            array_push($result ,$data  );
        }

        return $result;
    }
    public function  getMultipleChoicesByLang($lang){
        $result=[];
        foreach($this->multipleChoices as $multipleChoice){
            $data  = $multipleChoice->getByLang($lang);
            array_push($result ,$data  );
        }

        return $result;
    }


    public function  getAttributesByLang($lang){
        $result=[];

        foreach($this->itemAttributes as $key=>$attribute){
            $data  = $attribute->getByLang($lang);
            array_push($result ,$data  );

        }

        return $result;
    }




}
