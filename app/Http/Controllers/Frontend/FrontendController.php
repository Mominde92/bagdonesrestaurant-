<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Area;
use App\Models\AreaStore;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Country;
use App\Models\Store;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Home;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Support\Facades\App;
use App\Models\Attribute_entry;
use Cookie;
use App\Http\Controllers\Controller;
use App\Models\Log;

class FrontendController extends Controller
{
  public function __construct()
  {
    $Categories = Category::whereNull('parent_id')->get();
    $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(4);

      view()->share('Categories','subCategories');
  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      try {
        $lang = App::getLocale();
        //select all records
        $homeRecords = Home::with('subCategory')->paginate(4);
        $updatedItems = $homeRecords->getCollection();

        $Categories = Category::whereNull('parent_id')->get();

        $result =[];

        foreach ($updatedItems as $key => $homeRecord)
        {
            $data = [];

            $data['homeid'] = $homeRecord->id ;

           if(strtolower( $homeRecord->content_type->name) == 'offer')
           {
            $data['content_type'] = 'offer';
            $data['appearance'] = $homeRecord->appearance->number;
            $data['id'] = $homeRecord->id;
           }
           elseif(strtolower( $homeRecord->content_type->name) == 'category')
           {
            $data['content_type'] = 'category';
            $data['appearance'] = $homeRecord->appearance->number;
            $data['Categories'] = Category::whereNull('parent_id')->get();
            $data['id'] = $homeRecord->id;
           }
           elseif(strtolower( $homeRecord->content_type->name) == 'sub category')
           {
            $data['content_type'] = 'sub_category';
            $data['appearance'] = $homeRecord->appearance->number;

            if($data['appearance'] == '202')
            {
                $data['sub_category'] = $homeRecord->subCategory->name ;
                $data['items'] =  Item::select('items.id','items.name','items.description','items.price','items.new_price', 'items.main_screen_image','items.cover_image' , 'items.in_stock' , 'stores.name as store_name','stores.id as store_id','stores.image as store_image','categories.name as sub_category_name')
            ->where('sub_category_id',$homeRecord->subCategory->id)->leftjoin('stores', 'stores.id', '=', 'items.store_id')
            ->join('categories', 'categories.id', '=', 'items.sub_category_id')
            ->orderBy('id', 'desc')->get()->take(9);
            $data['id'] = $homeRecord->id;
            }

            if($data['appearance'] == '201')
            {
                $data['sub_category'] = $homeRecord->subCategory->name ;
                $data['items'] =  Item::select('items.id','items.name','items.description','items.price','items.new_price', 'items.main_screen_image','items.cover_image' , 'items.in_stock' , 'stores.name as store_name','stores.id as store_id','stores.image as store_image','categories.name as sub_category_name')
            ->where('sub_category_id',$homeRecord->subCategory->id)->leftjoin('stores', 'stores.id', '=', 'items.store_id')
            ->join('categories', 'categories.id', '=', 'items.sub_category_id')
            ->orderBy('id', 'desc')->get()->take(9);
            $data['id'] = $homeRecord->id;
            }
            if($data['appearance'] == '203')
            {
                $data['sub_category'] = $homeRecord->subCategory->name ;
                $data['slider_web'] = $homeRecord->subCategory->slider_web ;
                $data['items_store'] =  Item::select('items.id','items.name','items.description','items.price','items.slider_web','items.new_price', 'items.main_screen_image','items.cover_image' , 'items.in_stock' , 'stores.name as store_name','stores.id as store_id','stores.image as store_image','categories.name as sub_category_name,categories.slider_web as slider_web')
                ->where('sub_category_id',$homeRecord->subCategory->id)
                ->leftjoin('stores', 'stores.id', '=', 'items.store_id')
                ->join('categories', 'categories.id', '=', 'items.sub_category_id')
                ->orderBy('id', 'desc')->get()->take(9);
                $data['id'] = $homeRecord->id;

            }

            if($data['appearance'] == '204')
            {
              $data['items'] =  Item::select('items.id','items.name','items.description','items.price','items.new_price', 'items.main_screen_image','items.cover_image' , 'items.in_stock' , 'stores.name as store_name','stores.id as store_id','stores.image as store_image','categories.id as sub_category_id','categories.cover_image as category_cover_image')
                ->where('sub_category_id',$homeRecord->subCategory->id)
                ->leftjoin('stores', 'stores.id', '=', 'items.store_id')
                ->join('categories', 'categories.id', '=', 'items.sub_category_id')
                ->orderBy('id', 'desc')->first();
                $data['id'] = $homeRecord->id;
            }

            $subCategory =[
                'id'=>$homeRecord->subCategory->id,
                'name'=>$lang == 'en' ? $homeRecord->subCategory->name : $homeRecord->subCategory->name_locale,
                'parent_id' => $homeRecord->subCategory->parent_id,
                'image'=> $homeRecord->subCategory->image != null ? asset('uploads/category/' . $homeRecord->subCategory->image): $homeRecord->subCategory->image ,
                'cover_image'=>  $homeRecord->subCategory->cover_image != null ? asset('uploads/category/' . $homeRecord->subCategory->cover_image): $homeRecord->subCategory->cover_image
            ];

            $data['sub_category'] = $subCategory ;

           }
           elseif( strtolower( $homeRecord->content_type->name) == 'item'){
            $data['content_type'] = 'item';
            $data['appearance'] = $homeRecord->appearance->number;
            $data['items'] = Item::where('id',$homeRecord->item->id)->first();
            $data['id'] = $homeRecord->id;
            //item
            //Todo bring item
            $data['item']= $homeRecord->item->getByLang($lang);

           }
           elseif(strtolower( $homeRecord->content_type->name) == 'store'){
            $data['content_type'] = 'store';
            $data['appearance'] = $homeRecord->appearance->number;
            $data['id'] = $homeRecord->id;
            //store

           }
           array_push($result , $data);

        }//end for
        if($request->ajax())
        {
          $view = view('frontend.homeappearances',compact('result'))->render();
          return response()->json(['html'=>$view]);
        }

        $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(4);

        return view('frontend.index', compact('result','Categories','subCategories'));
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    public function ProductDetails($id)
    {
      try {
        $item = Item::where('id',$id)->first();

        $Categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::wherenotNull('parent_id')->get()->take(3);
        $itemssuggest = Item::where('sub_category_id',$item->sub_category_id)->where('id' ,'!=' , $id)->get();

        $newItems = Item::orderby('created_at')->get()->take(3);

        return view('frontend.product_details', compact('item','itemssuggest','Categories','subCategories','newItems'));
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    public function category($id)
    {
      try {
        $category = Category::where('id',$id)->first();
        $Categories = Category::whereNull('parent_id')->get();

        $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(3);

        $subCategoriesfilter = Category::wherenotNull('parent_id')->get();

        $Attribute_size = Attribute_entry::where('attribute_id','2')->get();
        $Attribute_color = Attribute_entry::where('attribute_id','3')->get();


        return view('frontend.category', compact('category','Categories','subCategories','Attribute_size','Attribute_color','subCategories','subCategoriesfilter'));
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }


    public function subcategory($id,Request $request)
    {
      try {
        $category = Category::where('id',$id)->first();

        $Categories = Category::whereNull('parent_id')->get();

        $categoryid = $category->id  ;
        $items = item::where('sub_category_id',$category->id)->orderBy('created_at','DESC')->paginate(3);
        if($request->ajax())
        {
          $view = view('frontend.paginateitem',compact('items'))->render();
          return response()->json(['html'=>$view]);
        }

        $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(3); ;


        $Attribute_size = Attribute_entry::where('attribute_id','2')->get();
        $Attribute_color = Attribute_entry::where('attribute_id','3')->get();

        $subCategoriesfilter = Category::wherenotNull('parent_id')->get();

        return view('frontend.subcategory', compact('category','Categories','items','categoryid','subCategories','Attribute_color','Attribute_size','subCategoriesfilter'));
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
      }

    public function searchItem(Request $request)
    {
      try {
      if(!empty($request['search'] ) ){
      $lang = App::getLocale();

        $query = Item::orderBy('id', 'DESC')
                     ->leftjoin('stores', 'stores.id', '=', 'items.store_id')
                    ->leftjoin('categories as sub_category', 'sub_category.id', '=', 'items.sub_category_id')
                    ->leftjoin('categories', 'categories.id', '=', 'sub_category.parent_id')
                    ->leftjoin('areas', 'stores.area_id', '=', 'areas.id')
                    ->leftjoin('cities', 'areas.city_id', '=', 'cities.id');

        if($lang == 'en'){
           $query->select('items.id','items.name','items.description','items.price','items.new_price', 'items.main_screen_image','items.cover_image' , 'items.in_stock' , 'stores.name as store_name' , 'sub_category.name as sub_category_name' ,'categories.name as categories_name', 'stores.id as store_id', 'sub_category.id as sub_category_id' );

        }elseif($lang == 'ar'){
           $query->select('items.id','items.name_locale as name','items.description_locale as description','items.price','items.new_price', 'items.main_screen_image','items.cover_image' , 'items.in_stock' , 'stores.name_locale as store_name' , 'sub_category.name_locale as sub_category_name','categories.name as categories_name','stores.id as store_id', 'sub_category.id as sub_category_id' );
        }

            $serach = $request['search'];
            $query->where('items.name' ,'like', '%' . $serach . '%');
            $query->orwhere('sub_category.name' , 'like', '%' . $serach . '%');

        //the store needs to be active
        $query->where('stores.is_open' ,1);

        $items = $query->paginate(10);
        }

        else
        {
          $items = [];
        }

        if($request->ajax())
        {
          $view = view('frontend.paginateitem',compact('items'))->render();
          return response()->json(['html'=>$view]);
        }

        $Categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(3);


        $Attribute_size = Attribute_entry::where('attribute_id','2')->get();
        $Attribute_color = Attribute_entry::where('attribute_id','3')->get();

        return view('frontend.search', compact('Categories','items','subCategories','Attribute_color','Attribute_size'));
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    public function aboutPage()
    {
      try {
      $Categories = Category::whereNull('parent_id')->get();
      $subCategories = Category::wherenotNull('parent_id')->get()->take(3);

      return view('frontend.about-page',compact('Categories','subCategories'));
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    public function contactUsPage()
    {
      try {
      $Categories = Category::whereNull('parent_id')->get();
      $subCategories = Category::wherenotNull('parent_id')->get()->take(3);

      return view('frontend.contactus',compact('Categories','subCategories'));
    } catch (\Exception $ex) {
      $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
      
   }
    }

    public function addressDelver(Request $request)
    {
      try {
      $address = $request->address;
      session()->put('address', $address);
      return back();
    
      } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }

  }


}