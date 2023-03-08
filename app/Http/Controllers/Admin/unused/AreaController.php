<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AreaCreateRequest;
use App\Http\Requests\AreaUpdateRequest;

class AreaController extends Controller
{
    protected $namespace = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax())
        {
            $data = DB::table('areas as aaa')->join('cities as c', 'c.id', '=', 'aaa.city_id')
            ->select('aaa.id','aaa.name','aaa.name_local','c.name as city_name')->get();
            return DataTables::of($data)->make(true);
        }


        return view('admin.areas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('areas.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaCreateRequest $request)
    {

        Area::create($request->all());

        return redirect()->route('area.index')->with('success','Area created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        $city = City::find($area->city_id);
        $page_title = 'Show Area';
        $page_description = 'This page is to show area details';

        return view('admin.areas.show',compact('area','city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $city = City::find($area->city_id);

        return view('areas.edit',compact('area','city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaUpdateRequest $request, Area $area)
    {
    
        $area->update($request->all());

        return redirect()->route('area.index')->with('success','Area updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $com = Area::where('id',$request->id)->delete();
        return Response()->json($com);
    }

     /** get area Arabic names list */

    public function getAreaArabicNames()
    {
        $data = City::select('id','name_local','city_id')->get();
        return $data;
    }
    /** get area Arabic names list  */
    public function getAreaEnglishNames()
    {
        $data = City::select('id','name','city_id')->get();
        return $data;
    }

    public function get_area_select_list(Request $request)
    {
        $search = $request->search;
        $city_id = $request->city_id;

        if($search == '')
        {
           $areas = Area::orderby('name','asc')->select('id','name')->where('city_id' , $city_id)->get();
        }
        else
        {
           $areas = Area::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->where('city_id' , $city_id)->get();
        }

        $response = array();
        foreach($areas as $areas)
        {
           $response[] = array(
                "id"=>$areas->id,
                "text"=>$areas->name);
        }
        return response()->json($response);
    }

}
