<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Http\Resources\City as CityResource;
use App\Http\Resources\City as AreaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Log;

class CityController extends BaseController
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
            $cities = City::select('id','name', 'country_id' )->get();
        }
        elseif($lang == 'ar')
        {
            $cities = City::select('id','name_local as name', 'country_id' )->get();
        }
        return $this->sendResponse(CityResource::collection($cities), 'cities retrieved successfully.');
    }
    catch (\Exception $ex) 
    {
        return $this->sendResponse($ex->getMessage(),'');
    }
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

        $city = City::find($id);

        if (is_null($city)) {
            return $this->sendError('City not found.');
        }

        return $this->sendResponse(new CityResource($city), 'city retrieved successfully.');
    }
    catch (\Exception $ex) 
    {
        return $this->sendResponse($ex->getMessage(),'');
    }
    }


    public function getAreas($id){
        try {
        $lang = App::getLocale();
        $name = 'name as name' ;
        if($lang == 'ar'){
            $name = 'name_local as name';
        }
        $cities= \Illuminate\Support\Facades\DB::table('cities')->join('areas','cities.id','=','areas.city_id')->select('areas.id as id','areas.'.$name,'city_id')->where('cities.id','=',$id)->get();

        return $this->sendResponse($cities, 'Areas retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }
}
