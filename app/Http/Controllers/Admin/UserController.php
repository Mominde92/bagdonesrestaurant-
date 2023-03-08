<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Socialite;
use App\Models\Log;

class UserController extends Controller
{
   public function index()
    {
        try {
        return view('admin.login');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }


    public function login(Request $request)
    {
        try {
        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials))
        {
            return back()->with('succes_message', 'Email or Password not matched');
        }
        elseif(auth()->guard('web')->user()->role_id == '1')
        {
            return redirect('/dashboard');
        }
        elseif(auth()->guard('web')->user()->role_id == '2')
        {
            return redirect()->route('ecommerce');
        }
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 

    }
    public function logout()
    {
        try {
        Auth::logout();
        return redirect()->route('ecommerce');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }

    /** **/

    public function redirectToGoogle()
    {
        try {
        return Socialite::driver('google')->redirect();
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try
         {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser)
            {
                Auth::login($finduser);

                return redirect('/ecommerce');

            }
            else
            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                return redirect('/ecommerce');
            }

    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }

                /**
             * Login Using Facebook
             */
            public function loginUsingFacebook()
            {
                try {
                return Socialite::driver('facebook')->redirect();
            } catch (\Exception $ex) {
                $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
                
            } 
            }

            public function callbackFromFacebook()
            {
            try {
                $user = Socialite::driver('facebook')->user();

                $saveUser = User::updateOrCreate([
                    'facebook_id' => $user->getId(),
                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                        ]);

                Auth::loginUsingId($saveUser->id);

                return redirect()->route('home');
                } 
                catch (\Throwable $th)
                {
                    throw $th;
                }
            }
}



