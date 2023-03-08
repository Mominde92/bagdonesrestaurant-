<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appearance;
use App\Models\Content_type;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Http\Requests\AppearanceCreateRequest;
use App\Http\Requests\AppearanceUpdateRequest;
use App\Models\Log;

class AppearanceController extends Controller
{
    protected $namespace = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        if ($request->ajax()) 
        {
            $data = Appearance::join('content_types', 'appearances.content_type_id', '=', 'content_types.id')
              		->get(['appearances.id', 'appearances.number','content_types.name as content_type']);

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', 'admin.appearances.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.appearances.index');
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
        $content_types = Content_type::all();

        return view('admin.appearances.create', compact( 'content_types'));
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
    public function store(AppearanceCreateRequest $request)
    {
        try {
        $input = $request->all();
        Appearance::create($input);

        return redirect()->action([AppearanceController::class, 'index'])->with('success','Appearance created successfully.');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Appearance $appearance)
    {
        try {
        return view('admnin.appearances.show');
         } catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Contracts\View\View
     */
    public function edit( $id)
    {
        try {
        $appearance = Appearance::find($id);
        $content_types = Content_type::all();
          } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
         }
        return view('admin.appearances.edit',compact('appearance','content_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppearanceUpdateRequest $appearance)
    {
        try {
        $appearance->update($request->all());
        } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
         }

        return redirect()->action([self::class, 'index'])->with('success','Appearance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appearance  $appearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
        $appearance = Appearance::where('id',$request->id)->delete();
        return Response()->json($appearance);
        } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
}
}