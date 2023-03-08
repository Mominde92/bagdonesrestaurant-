<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Http\Resources\Area as AreaResource;
use Illuminate\Support\Facades\App;
use App\Models\Log;

class AreaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $lang = App::getLocale();

        if($lang == 'en')
        {
            $areas = Area::select('id','name', 'city_id' )->get();
        }
        elseif
        ($lang == 'ar')
        {
            $areas = Area::select('id','name_local as name', 'city_id' )->get();
        }
        return $this->sendResponse(AreaResource::collection($areas), 'Areas retrieved successfully.');
    }catch (\Exception $ex) 
    {
        return $this->sendResponse($ex->getMessage(),'');
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
        $area = Area::find($id);

        if (is_null($area)) {
            return $this->sendError('area not found.');
        }

        return $this->sendResponse(new AreaResource($area), 'Area retrieved successfully.');
    }
    catch (\Exception $ex) 
    {
        return $this->sendResponse($ex->getMessage(),'');
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
