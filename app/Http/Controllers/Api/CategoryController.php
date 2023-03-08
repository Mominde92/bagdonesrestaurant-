<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Resources\Category as CategoryResourse;
use App\Models\Log;

class CategoryController extends BaseController
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
            $categories = Category::select('id','name','image' )->where('parent_id', null)->paginate(10);
        }
        elseif($lang == 'ar')
        {
            $categories = Category::select('id','name_locale as name', 'image' )->where('parent_id', null)->paginate(10);
        }


        foreach($categories as $category)
        {
            $category->image = asset('uploads/category/' . $category->image);
        }

        return $this->sendResponse($categories, 'categories retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }

    }

    public function getSubCategories($id){
        try {
        $lang = App::getLocale();
        $name = 'name as name' ;

        if($lang == 'ar'){
            $name = 'name_locale as name';
        }
        $categories = Category::select('id',$name,'image', 'parent_id' )->where('parent_id', $id)->paginate(10);

        foreach($categories as $category)
        {
            $category->image = asset('uploads/category/' . $category->image);
        }

        return $this->sendResponse($categories, 'SubCategories retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }

    public function getParentCategory($id)
    {
        try {
        $category = Category::find($id);
        if (is_null($category)) {
            return $this->sendError('category not found.');
        }
        if (is_null($category->parent_id)) {
            return $this->sendError('This is a main category');
        }

        $lang = App::getLocale();
        $name = 'name as name' ;
        if($lang == 'ar'){
            $name = 'name_locale as name';
        }
        $categories = Category::select('id',$name,'image', 'parent_id' )->where('id', $category->parent_id)->get();


        foreach($categories as $category)
        {
            $category->image = asset('uploads/category/' . $category->image);
        }

        $message = $categories->parent_id == null ? 'category': 'subCategory';
        return $this->sendResponse($categories, $message .' retrieved successfully.');
        }
        catch (\Exception $ex) 
        {
            return $this->sendResponse($ex->getMessage(),'');
        }
    }


}
