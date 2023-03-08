<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
      $Categories = Category::whereNull('parent_id')->get(); 
      return view('frontend.register',compact('Categories'));
    }

    public function register_user(Request $request)
    {
      $user = new user();
      $user->full_name = $request->first_name . $request->last_name ; 
      $user->email = $request->email ; 
      $user->password = bcrypt($request->password) ; 
      $user->save();
    }

    public function login_user(Request $request)
    {
     $email = $request->email;
     $password = $request->password;

    }


    public function forget_pwd(Request $request)
    {
      $Categories = Category::whereNull('parent_id')->get(); 
        return view('frontend.forget_pwd',compact('Categories'));
    }

    public function forget_pwd_user(Request $request)
    {
     
    }
 
            
  }

    
