<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Attribute_entry;
use App\Models\Attribute;
use App\Http\Controllers\Controller;
use App\Models\Log;

class FilterController extends Controller
{
    public function filterList(request $request)
    {
        try {
        $Categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::wherenotNull('parent_id')->get()->take(4);


        $subCategoriesfilter = Category::wherenotNull('parent_id')->get();

        $Attribute_size = Attribute_entry::where('attribute_id','2')->get();
        $Attribute_color = Attribute_entry::where('attribute_id','3')->get();

        $items_qeury = Item::query();

        if(isset($request->Category))
        {
        $Categories_get_childern = Category::whereIn('id',$request->Category)->with('get_childern')->get();
        $id = [];

            foreach($Categories_get_childern as $Category)
            {
                $count = count($Category->get_childern);
                    for( $i = 0; $i<($count); $i++ )
                    {
                        array_push($id,$Category->get_childern[$i]->id);
                    }
           }

            $items_qeury->whereIn('sub_category_id',($id));
        }

        if(isset($request->sub_category_id))
        {
            $items_qeury->whereIn('sub_category_id',($request->sub_category_id));
        }

        if(isset($request->Attribute_size))
        {
            $value = $request->Attribute_size ;

            $items_qeury->with(['itemAttributes' => function($q) use($value)
            {
               $q->where('id','2');
            }]);
        }

        if(!empty($request['min'])  )
        {
            $price_from = $request['min'];

        }

        if(!empty($request['max'] ) )
        {
            $price_to = $request['max'];
            if($items_qeury)
            {
                $items_qeury->where('items.new_price' ,'<=' , $price_to);
                $items_qeury->where('items.new_price' ,'>=' , $price_from);
            }
            else
            {
                $items_qeury->where('items.price' ,'<=' , $price_to);
                $items_qeury->where('items.price' ,'>=' , $price_from);
            }
        }

        $items = $items_qeury->get();

        if($request->ajax())
        {
          $view = view('frontend.paginateitem',compact('items'))->render();
          return response()->json(['html'=>$view]);
        }

        return view('frontend.filter', compact('Categories','subCategories','items','Attribute_size','Attribute_color','subCategoriesfilter'));
    }
    catch (\Exception $ex) 
    {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
    }
    }

    public function filterAjax(Request $request)
    {
        try {
        $items_qeury = Item::query();

        if(isset($request->Category))
        {
        $Categories_get_childern = Category::whereIn('id',$request->Category)->with('get_childern')->get();
            $id = [];

            foreach($Categories_get_childern as $Category)
                {
                $count = count($Category->get_childern);
                    for( $i = 0; $i<($count); $i++ )
                    {
                        array_push($id,$Category->get_childern[$i]->id);
                    }
                }

            $items_qeury->whereIn('sub_category_id',($id));
        }

        if(isset($request->sub_category_id))
        {
            $items_qeury->whereIn('sub_category_id',($request->sub_category_id));
        }

        if(isset($request->Attribute_size))
        {
            $value = $request->Attribute_size ;

            $items_qeury->with(['itemAttributes' => function($q) use($value)
            {
               $q->where('id','2');
            }]);
        }

        if(!empty($request['min'])  )
        {
            $price_from = $request['min'];

        }

        if(!empty($request['max'] ) )
        {
            $price_to = $request['max'];
            if($items_qeury)
            {
                $items_qeury->where('items.new_price' ,'<=' , $price_to);
                $items_qeury->where('items.new_price' ,'>=' , $price_from);
            }
            else
            {
                $items_qeury->where('items.price' ,'<=' , $price_to);
                $items_qeury->where('items.price' ,'>=' , $price_from);
            }
        }

        $items = $items_qeury->get();

        if($request->ajax())
        {
          $view = view('frontend.paginateitem',compact('items'))->render();
          return response()->json(['html'=>$view]);
        }
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }

    
}


}
