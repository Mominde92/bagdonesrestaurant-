<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Item;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Compulsory_choice;
use App\Models\Multiple_choice;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\ItemImage;
use App\Helpers\ImageHelper;
use App\Models\OrderItems;
use App\Http\Requests\ItemCreateRequest;
use App\Http\Requests\ItemUpdateRequest;
use Session;
use App\Models\Log;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {   
        try {
        if ($request->ajax()) 
        {
            $items = Item::orderBy('id', 'DESC')->leftJoin('categories', 'categories.id', '=', 'items.sub_category_id')
            ->get(['items.id as id','items.main_screen_image as main_screen_image','items.name as name','categories.name as sub_category_name','items.price as price' ,'items.new_price as new_price','items.in_stock as in_stock','items.created_at']);

            return DataTables::of($items)->addIndexColumn()
            ->addColumn('action', 'admin.items.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }


        return view('admin.items.index');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        try {
        $stores = Store::all();
        
        if($stores->count() == 0 )
        {
            return view('admin.items.store_error');
        }

        $attributes = Attribute::all();
        $compulsory_choices = Compulsory_choice::all();
        $multipule_choices = Multiple_choice::all();

        return view('admin.items.create', compact('stores' , 'attributes' ,'compulsory_choices' ,'multipule_choices' ));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemCreateRequest $request )
    {
        try {

        $input =$request->all();

        //check if is open checked
        $input['in_stock'] = isset($request->in_stock) ? true : false;

        $input['cover_image'] = ImageHelper::handleUploadedImage($request->file('cover_image'),'uploads/items/');
        $input['slider_web'] = ImageHelper::handleUploadedImage($request->file('slider_web'),'uploads/items/');


        $input['main_screen_image'] = '' ;
        //save item
        $item = Item::Create($input);


        $main_screen_images = $request->file('main_screen_image');
        if($request->file('main_screen_image'))
        {
            foreach($main_screen_images as $file)
            {

            $input['main_screen_image'] = ImageHelper::handleUploadedImage($file,'uploads/items/');

            $ItemImage = new ItemImage ;
            $ItemImage->item_id = $item->id;
            $ItemImage->image = $input['main_screen_image'];
            $ItemImage->save();

            $item->update($input);
            }
        }

        //save many to many relations
        if(!empty($input['attributes']))
        {
            $item->itemAttributes()->attach( $input['attributes']);
        }
        if(!empty($input['compulsory_choices']))
        {
            $item->compulsoryChoices()->attach( $input['compulsory_choices']);
        }
        if(!empty($input['multipule_choices']))
        {
            $item->multipleChoices()->attach( $input['multipule_choices']);
        }



        return redirect()->action([self::class, 'index'])->with('success','Item created successfully.');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Item $item)
    {
        try {
        $stores = Store::all();
        $attributes = Attribute::all();
        $compulsory_choices = Compulsory_choice::all();
        $multipule_choices = Multiple_choice::all();
        $ItemImages =ItemImage::where('item_id',$item->id)->get();

        return view('admin.items.edit',compact('item', 'stores' , 'attributes' ,'compulsory_choices' ,'multipule_choices','ItemImages'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {
        try {
        $input =$request->all();

        //check if is open checked
        $input['in_stock'] = isset($request->in_stock) ? true : false;

        $main_screen_images = $request->file('main_screen_image');

        if($request->file('main_screen_image'))
        {
            foreach($main_screen_images as $main_screen_image)
            {
            $input['main_screen_image'] = ImageHelper::handleUpdatedUploadedImage($main_screen_image,'/uploads/items/',$item,'/uploads/items/','main_screen_image');

            $ItemImage = new ItemImage ;
            $ItemImage->item_id = $item->id;
            $ItemImage->image = $input['main_screen_image'];
            $ItemImage->save();
            }
        }
    

        if ($cover_image = $request->file('cover_image'))
        {
            $input['cover_image'] = ImageHelper::handleUpdatedUploadedImage($cover_image,'/uploads/items/',$item,'/uploads/items/','cover_image');
        }

        if ($slider_web = $request->file('slider_web'))
        {
            $input['slider_web'] = ImageHelper::handleUpdatedUploadedImage($slider_web,'/uploads/items/',$item,'/uploads/items/','slider_web');
        }


        $item->update($input);

        //save many to many relations

        if(!empty($input['attributes']))
        {
            $item->itemAttributes()->detach();
            $item->itemAttributes()->attach( $input['attributes']);
        }
        if(!empty($input['compulsory_choices']))
        {
            $item->compulsoryChoices()->detach();
            $item->compulsoryChoices()->attach( $input['compulsory_choices']);
        }
        if(!empty($input['multipule_choices']))
        {
            $item->multipleChoices()->detach();
            $item->multipleChoices()->attach( $input['multipule_choices']);
        }

        return redirect()->action([self::class, 'index'])->with('success','Item updated successfully.');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try 
        {
            $item = Item::find($request->id);
            
        // $item = Item::where('id',$request->id)->first();

        $orders = OrderItems::where('item_id',$request->id)->get();

        $result=[];

        if($orders->count() > 0 )
        {
        
            $result[1] = 1;
            foreach($orders as $order)
            {
                $result[2] = 'This Items Have Order ID '.  $order->id;
            }
            
 
            return $result;
        }

        ImageHelper::handleDeletedImage($item->main_screen_image,'uploads/items/');

        ImageHelper::handleDeletedImage($item->cover_image,'uploads/items/');
       
       if($item->images)
       {
        foreach ($item->images as $image)
        {
            ImageHelper::handleDeletedImage($image->image,'uploads/items/');
        }
       }
       
       $ItemImages = ItemImage::where('item_id',$request->id)->get();
      
       if(!$ItemImages->isEmpty())
        {
            foreach($ItemImages as $ItemImage)
            {
                $ItemImage->delete();
            }
        }

        $item->delete();
        return Response()->json($item);

       }
       catch (\Exception $ex) 
       {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);

       } 
       
    }

    public function delete_image(Request $request)
    {
        try {
        ItemImage::where('image',$request->image)->delete();
        unlink('uploads/items/'.$request->image) ;

        return back();
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }



}
