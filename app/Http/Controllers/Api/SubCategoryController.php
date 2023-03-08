<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Resources\Category as CategoryResourse;
use App\Models\Log;

class SubCategoryController extends BaseController
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
        if($lang == 'en'){
            $categories = Category::select('id','name', 'parent_id' ,'cover_image')->where('parent_id','!=', null)->paginate(10);
        }elseif($lang == 'ar'){
            $categories = Category::select('id','name_locale as name', 'parent_id' ,'cover_image' )->where('parent_id','!=', null)->paginate(10);
        }

        foreach($categories as $category)
        {
            $category->image = asset('uploads/category/' . $category->image);
        }


        foreach($categories as $category)
        {
            if(!is_null($category->cover_image))
            {
                $category->cover_image = asset('uploads/category/' . $category->cover_image);
            }
         }

        return $this->sendResponse($categories, 'categories retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }

    }


    public function getSubCategories($id)
    {
        try {
        $lang = App::getLocale();
        $name = 'name as name' ;

        if($lang == 'ar'){
            $name = 'name_local as name';
        }
        $categories = Category::select('id',$name,'image', 'parent_id','cover_image' )->where('parent_id', $id)->paginate(10);
        foreach($categories as $category){

            if(!is_null($category->cover_image))
            {
                $category->cover_image = asset('uploads/category/' . $category->cover_image);
          }
         }
        return $this->sendResponse($categories, 'SubCategories retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }

    public function dataAjax(Request $request)
    {
        try {
        $search = $request->search;
        $parent_id = isset($request->parent_id) ? $request->parent_id : null ;
        // if($request->ajax()){
            if($search == ''){
                $categories = Category::orderby('name','asc')->
                select('id','name' , 'name_locale') ;

             }else{
                $categories = Category::orderby('name','asc')
                ->select('id','name','name_locale')
                ->where('name', 'like', '%' .$search . '%') ;

             }

             if($parent_id != null){
                 $categories->where('parent_id','=', $parent_id);
             }else{
                 $categories->where('parent_id','!=', null);
             }

             $subCats = $categories->limit(10)->get();
             $response = [];
             foreach($subCats as $category){
                $response[] = array(
                     "id"=>$category->id,
                     "text"=>$category->name .' - '.$category->name_locale
                );
             }
             return response()->json($response);
            }
            catch (\Exception $ex) 
            {
                return $this->sendResponse($ex->getMessage(),'');
            }

    }
}
