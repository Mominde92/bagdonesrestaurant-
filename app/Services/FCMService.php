<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FCMService
{ 
    public static function send($token,$data)
    {
        Http::acceptJson()->withToken(config('fcm.token'))->post(
            'https://fcm.googleapis.com/fcm/send',
            [
                'to' => $token,
                'data'=>$data,
                'notification' => $data,
                "content_available"=>true,
                "apns-priority"=>"5",
               
            ]
        );
	
    }

    public static function sendNotication($to,$data)
    {
        $apiUrl="https://fcm.googleapis.com/fcm/send";

        $headers = [
          "Authorization:key=AAAAsdVY5pQ:APA91bHKKIhq92QqoEfLMfoPeihaTERFzAtXU3-x7_IFpM-BjL3zeUV-jNGrt4DHzzWheWLUCzdJp_XUcb0Q2YHD7SIkRYRn7Rb1pG-wtQiGLh0tBhXZPi0ONGwC3NSv4-Tiazm_QnF_",
          "Content-Type: application/json"
          
      ];
      
      $contentArray=[
        "to" => $to,
        "data"=> $data ,
        "notification"=> $data , 
        "content_available"=>true,
        "apns-priority"=>"5"
        
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$apiUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contentArray));
    $result = curl_exec($ch);
    curl_close($ch);

        return $result;
    }
}