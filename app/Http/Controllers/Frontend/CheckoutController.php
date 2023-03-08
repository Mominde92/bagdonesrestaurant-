<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Item;

use App\Models\OrderItems;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Services\FCMService;
use Redirect;
use App\Models\Payment;
use Stripe ;
use Exception;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Log;

class CheckoutController extends Controller
{



    public function checkoutlist()
    {
        try {
        $Categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(3);

        return view('frontend.checkout', compact('Categories','subCategories'));
        } catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
        }
    }

    public function orderSuccess()
    {
        try {
        $Categories = Category::whereNull('parent_id')->get();
        $subCategories = Category::wherenotNull('parent_id')->wherein('id',['40','27','49','47'])->get()->take(3);

        return view('frontend.order-success', compact('Categories','subCategories'));
        } catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
        }
    }

    public function checkout(Request $request)
    {
        try {
        $delivery_fee=floatval(config('appGlobal.delivery_fee'));
        $tax=floatval(config('appGlobal.tax'));
        $amount = 0 ;
        foreach(session('cart') as $id => $details)
        {
            $amount  += $details['price'] * $details['quantity'] ;
        }

        $total_amount = $amount + $tax + $delivery_fee ;

        if($request->payment_group == 'card')
        {


            $stripe = Stripe::make(env('STRIPE_SECRET_KEY'));

            try
            {
                $token = $stripe->tokens()->create([
                    'card'=>[
                        'number' => $request->Number,
                        'cvc' => $request->cvvNumber,
                        'exp_month' => $request->ccExpiryMonth,
                        'exp_year' => $request->ccExpiryYear,
                    ]
                    ]);
            }
            catch(\Exception $e)
            {
                session()->flash('error',$e->getMessage());
                return back()->with('error','Your card Number Not Courrect');

            }


                if(!isset($token['id']))
                {
                    session()->flush('stripe_error','The stripe token was not genrated correctly!');

                }
                $customer = $stripe->customers()->create([
                    'name'=> 'test',
                    'email'=> 'test',
                    'phone'=> 'test',
                    'address' => [
                        'line1'=>'test',
                        'postal_code'=>'54321',
                        'city'=>'test',
                        'state'=>'test',
                        'country'=>'test',
                    ],
                    'shipping' => [
                        'name' => 'test',
                        'address' => [
                        'line1'=>'test',
                        'postal_code'=>'54321' ,
                        'city'=>'test',
                        'state'=>'test',
                        'country'=>'test',
                        ],

                    ],

                    'source' => $token['id']

                ]);

                try
                {

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency'=> env('STRIPE_CURRENCY'),
                    'amount' => $total_amount,
                    'description' => 'Paymanet for order no'

                ]);
                }

                catch(\Exception $e)
                {
                    session()->flash('error',$e->getMessage());
                    return back()->with('error','Your card Number Not Courrect');
                }

                      $this->store_payment([
                    'payment_id' => $charge['id'],
                    'payer_email' => 'test@test.com',
                    'amount' => $total_amount,
                    'currency' => env('STRIPE_CURRENCY'),
                    'payment_status' => $charge['status'],
                ]);

                if($charge['status'] == 'succeeded')
                {
                    return Redirect::route('ordersuccess');
                }


                else
                {
                    return Redirect::back()->with('error', 'Something error');
                }





        }


            $order = new Order();

            $order->city = $request->city;
            $order->area = $request->area;

            $order->amount =  $amount ;
            $order->tax = $tax;
            $order->delivery_fee = $delivery_fee ;


            $order->total_amount = floatval($total_amount);

            $order->street_n = $request->street_n;
            $order->building_n = $request->building_n;
            $order->floor_n = $request->floor_n;
            $order->appartment_n = $request->appartment_n;

            $order->phone_number = $request->phone_number;
            $order->gps_link = 'http://maps.google.com/maps?q=loc:'.$request->lat.','.$request->long;
            $order->device_type = 'windows';
            $order->device_token = $request->device_token;
            $order->customer_note = $request->customer_note;

            $order->save();


            foreach(session('cart') as $id => $cart)
                {
                     $item['item_id'] = intval($cart['id']);
                     $item['quantity'] = floatval($cart['quantity']);
                     $item['unit_price'] = floatval($cart['price']);
                      $item['order_id'] = $order->id;
                       OrderItems::create($item);
                }

                Session::forget('cart');

                return Redirect::route('ordersuccess');
            } catch (\Exception $ex) {
                $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
                
            }


    }

    public function store_payment($arr_data = [])
    {
        try {
        $isPaymentExist = Payment::where('payment_id', $arr_data['payment_id'])->first();

        if(!$isPaymentExist)
        {
            $payment = new Payment;
            $payment->payment_id = $arr_data['payment_id'];
            $payment->payer_email = $arr_data['payer_email'];
            $payment->amount = $arr_data['amount'];
            $payment->currency = env('STRIPE_CURRENCY');
            $payment->payment_status = $arr_data['payment_status'];
            $payment->save();
        }
        } catch (\Exception $ex) {
            $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
            
        }
    }

}
