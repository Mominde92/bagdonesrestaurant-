<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaStore;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Store;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Helpers\ImageHelper;
use App\Http\Requests\StoreCreateRequest;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\Log;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax())
        {
            $data = DB::table('stores')
            ->join('areas', 'areas.id', '=', 'stores.area_id')
            ->select('stores.*','areas.name as area_name_en','areas.name_local as area_name_local')
            ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', 'admin.stores.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        $stores = store::get();

        return view('admin.stores.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::all();

        return view('admin.stores.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreateRequest $request)
    {
    
        $input = $request->all();

        //fixed id
           $input['area_id'] = 1;

        //check if is open checked
            $input['is_open'] = isset($request->is_open) ? true : false;

        //check if allow hot price checked
            $input['allow_add_hot_price'] = isset($request->allow_add_hot_price) ? true : false;

            $input['image'] = ImageHelper::handleUploadedImage($request->file('image'),'uploads/stores/');
            $input['cover_image'] = ImageHelper::handleUploadedImage($request->file('cover_image'),'uploads/stores/');


         //add store areas
         $store = Store::create($input);

        return redirect()->action([StoreController::class, 'index'])->with('success','Store created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show(Store $store)
    {

        return view('stores.show',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $countries = Country::all();

        return view('admin.stores.edit',compact('store' , 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRequest $request, Store $store)
    {
      
        $input = $request->all();

        //fixed id
        $input['area_id'] = 1;

        //check if is open checked
        $input['is_open'] = isset($request->is_open) ? true : false;

        //check if allow hot price checked
        $input['allow_add_hot_price'] = isset($request->allow_add_hot_price) ? true : false;

        if ($image = $request->file('image'))
        {
            $input['image'] = ImageHelper::handleUpdatedUploadedImage($image,'/uploads/stores/',$store,'/uploads/stores/','image');
        }

        if ($cover_image = $request->file('cover_image'))
        {
            $input['cover_image'] = ImageHelper::handleUpdatedUploadedImage($cover_image,'/uploads/stores/',$store,'/uploads/stores/','cover_image');
        }

         //add store areas
          $store->update($input);

          return redirect()->action([StoreController::class, 'index'])->with('success','Store updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $store = Store::find($request->id);

        if(!is_null($store->items))
        {
            foreach($store->items as $item)
            {
                $items = Item::where('id',$item->id)->get();
                foreach($items as $item)
                {
                 $images = ItemImage::where('item_id',$item->id)->get();
                 foreach($images as $image)
                {
                    ImageHelper::handleDeletedImage($image->image,'uploads/items/');
                    $image->delete();
                }
                }
                
                foreach($items as $item)
                {
                    ImageHelper::handleDeletedImage($item->main_screen_image,'uploads/items/');
                    ImageHelper::handleDeletedImage($item->cover_image,'uploads/items/');
                    ImageHelper::handleDeletedImage($item->slider_web,'uploads/items/');
                    
                    $item->delete();
                }
            }
        }

        
        ImageHelper::handleDeletedImage($store->image,'uploads/stores/');
        ImageHelper::handleDeletedImage($store->cover_image,'uploads/stores/');

        $store = $store->delete();
        return Response()->json($store);
    }

    public function storeAjax(Request $request)
    {
        {
            $search = $request->search;

            if($search == ''){
                $Stores = Store::select('id','name')->get();
            }
            else
            {
                $Stores = Store::select('id','name')->get();
            }

            foreach($Stores as $Store){
                $response[] = array(
                    "id"=>$Store->id,
                    "text"=>$Store->name
                );
            }
            return response()->json($response);
        }
    }
}
