<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class Helper
{
    public static function datatable_btns ($controller,$id)
    {
        $btn = "
                    <a class='btn btn-info' href='show/".$id."'>Show</a>

                    <a class='btn btn-primary' href='edit/".$id."'>Edit</a>

                <form action='delete/".$id."' method='POST'>

                    @csrf
                    @method('DELETE')

                    <button type='submit' class='btn btn-danger'>Delete</button>
                </form>";

        return $btn;
    }

    public static function UploadImage ($image,$path)
    {
            $destinationPath = $path;
            $recordImage = time() . md5($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $image->move($destinationPath, $recordImage);
            $input['image'] = "$recordImage";
            
            return $recordImage ;
    }

    /*Send Emails*/
    static function sendEmail($mail, $message, $type, $subject)
    {
        try {
            Mail::to($mail)->send(new SendMail($message, $type, $subject));
            if (count(Mail::failures()) > 0) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return true;
        }
    }
    
}
