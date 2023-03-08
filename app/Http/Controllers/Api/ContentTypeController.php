<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Models\Content_type;
use App\Models\Category;
use App\Models\Log;

class ContentTypeController extends BaseController
{

    public function index()
    {
        try {
        $content_types =  Content_type::paginate(10);
        return $this->sendResponse($content_types, 'appearances retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }

    public function getAppearances($id)
    {
        try {
        $content_type = Content_type::find($id);
        $appearances = $content_type->appearances;
        foreach($appearances as $appearance){
            $response[] = array(
                 "id"=>$appearance->id,
                 "text"=>$appearance->number
            );
         }
         return response()->json($response);
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }

    public function show($id)
    {
        try {
        $data =[];
        $response =[];
        $lang = App::getLocale();
        $content_type = Content_type::find($id);
        $response['content_type'] = $content_type->appearances;

        return $this->sendResponse($response, 'appearances retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }


}
