<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use Redirect;
use Session;
use App\Models\Log;

class MailController extends Controller
{
   public function sendContactUs(Request $request) {
      try {
      $data = array('first_name'=>$request->first_name,'family_name'=>$request->family_name,'email'=>$request->email,'phone_number'=>$request->phone_number,'message'=>$request->message);

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('Abdullah.sm89@gmail.com', 'Contact Us')->subject
            ('Bagdones');
         $message->from('xyz@gmail.com','Contact Us');
      });


      return Redirect::back()->with('succes', 'تم الارسال بنجاح');
   } catch (\Exception $ex) {
      $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
      
  } 
   }

   public function sendRegister(Request $request) {
      try {
    $data = array('first_name'=>$request->first_name,'phone_number'=>$request->phone_number,'userEmail'=>$request->userEmail,'userMessage'=>$request->userMessage);

    Mail::send(['text'=>'Mail.regsiter'], $data, function($message) {
       $message->to('Abdullah.sm89@gmail.com', 'Regsiter')->subject
          ('Bagdones');
       $message->from('xyz@gmail.com','Regsiter');
    });
    return Redirect::back();
   } catch (\Exception $ex) {
      $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
      
  } 
 }

}
