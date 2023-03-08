<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content_type;
use App\Models\Home;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HomeCreateRequest;
use App\Http\Requests\HomeUpdateRequest;
use App\Models\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try {
        if ($request->ajax())
         {
            $data = Home::leftJoin('content_types' , 'homes.content_type_id','=','content_types.id')
            ->leftJoin('categories' , 'homes.sub_category_id','=','categories.id')
            ->leftJoin('items' , 'homes.item_id','=','items.id')
            ->leftJoin('appearances' , 'homes.appearance_number','=','appearances.id')
            ->get(['homes.id','content_types.name as content_type', 'appearances.number as appearance_number' , 'categories.name as sub_category_name' , 'items.name as item_name']);

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'admin.home.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.home.index');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }



    public function create() {
        try {
        $content_types = Content_type::all();
        return view('admin.home.create', compact('content_types'));
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
    public function store(HomeCreateRequest $request)
    {
        try {
        Home::create($request->all());

        return redirect()->action([HomeController::class, 'index'])->with('success','home record created successfully.');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }
    

      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        try {
        return view('admin.home.show',compact('home'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }

    public function edit(Home $home) 
    {
        try {
        $content_types = Content_type::all();

        return view('admin.home.edit',compact('home', 'content_types'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }

    public function update(HomeUpdateRequest $request, Home $home)
    {
        try {
        $input = $request->all();
        if( empty($input['item_id']))
        {
            $input['item_id']=null;
        }
        if( empty($input['sub_category_id']))
        {
            $input['sub_category_id']=null;
        }

        $home->update($input);

        return redirect()->action([HomeController::class, 'index'])->with('success','Home record updated successfully');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }


    public function destroy(Request $request) 
    {
        try {
        $Home = Home::where('id',$request->id)->delete();
        
        return Response()->json();
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }

}
