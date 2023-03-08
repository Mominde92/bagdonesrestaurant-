<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Order;
use App\Services\FCMService;
use App\Models\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        try {
        if ($request->ajax()) {

            $query = Order::orderByDesc('id')->get();

            return DataTables::of($query)->addIndexColumn()
            ->addColumn('action', 'admin.orders.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $order = Order::with('items')->get();;


        return view('admin.orders.index',compact('order'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ordersHistory(Request $request)
    {
        try {
        if ($request->ajax()) {

            $order = Order::where('deliverd','1')->with('items')->get();

            return DataTables::of($order)->addIndexColumn()
                ->addColumn('action', 'admin.orders.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $order = Order::where('deliverd','1')->with('items')->get();

        return view('admin.orders.Orders-History',compact('order'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }


    /**
     * Display the specified resource.
     *
     * @param  Order  $order
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Order $order)
    {
        try {
        $order = Order::where('id',$order->id)->with('items')->first();

        return view('admin.orders.show',compact('order'));
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }


    public function change_status(Request $request)
    {
        try {
        $id = $request->id;
        $status = $request->status;
        $order = Order::find($id);

        if($status == 'deliverd'){
            $order->setDeliverd();
            $order->setInDelivery();
            $order->setInProcess();
            $order->setRecived();

            $this->sendNotificationrToUser($order->device_token ,$status,$order );
        }

        elseif($status == 'in_delivery'){
            $order->setInDelivery();
            $order->setInProcess();
            $order->setRecived();
            $this->sendNotificationrToUser($order->device_token ,$status,$order );
        }
        elseif($status == 'in_process'){
            $order->setInProcess();
            $order->setRecived();
            $this->sendNotificationrToUser($order->device_token ,$status,$order );
        }
        elseif($status == 'recived'){
            $order->setRecived();
            $this->sendNotificationrToUser($order->device_token ,$status,$order );
        }
        // $order->update([$status => 1]);
        return Response()->json('success');
    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
    } 
    }


    private function sendNotificationrToUser($device_token , $status , $order )
    {
        try {

    $title = '';
    $body= '';
    if($status == 'deliverd'){
        $title = 'Order status';
        $body= ' Deliverd Order Number '.$order->id;
        $title_locale = 'حالة الطلب';
        $description_locale= ' تم التوصيل';
        $description_locale= 'تم توصيله '.$order->id.' طلبك رقم ';
        $imagepath = 'https://www.bagdones.com/app/uploads/notification/order-done.png';
    }

    elseif($status == 'in_delivery'){
        $title = 'Order status';
        $body= ' On The Way Order Number '.$order->id;
        $title_locale = 'حالة الطلب' ;
        $description_locale= 'في الطريق' .$order->id.' طلبك رقم ';
        $imagepath = 'https://www.bagdones.com/app/uploads/notification/order-delivery-truck.png';
    }
    elseif($status == 'in_process'){
        $title = 'Order status';
        $body= ' In Process Order Number '.$order->id;
        $title_locale = 'حالة الطلب';
        $description_locale= 'في تجهيز'.$order->id.' طلبك رقم ';
        $imagepath = 'https://www.bagdones.com/app/uploads/notification/order-processed.png';
    }
    elseif($status == 'recived'){
        $title = 'Order status';
        $body= ' Order Received Order Number '.$order->id;
        $title_locale = 'وصل الطلب';
        $description_locale= $order->id.' تم استلام طلبك رقم الطلب';
        $imagepath = 'https://www.bagdones.com/app/uploads/notification/received.png';
        $order_id = $order->id;

    //     $data = ['order_id'=> $order_id];


    // Mail::send(['html'=>'mail.recived'], $data, function($message) use ($email) {
    //     $message->to($email, 'Order status')->subject('Bagdones');
    //     $message->from('xyz@gmail.com','Order status');
    //  });

    }
        if($device_token==null ||  $device_token == '' ){
            return;
        }
        app('App\Http\Controllers\Admin\NotificationController')::sendNotificationToAll($device_token,$title,$body, $title_locale, $description_locale,$order->id,$imagepath,'order');

    }
        catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
        }
    } 


}
