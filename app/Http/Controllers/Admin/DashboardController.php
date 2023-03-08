<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Item;
use DB;
use App\Models\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
        $Orders = Order::count();
        $User = User::count();
        $is_online = User::where('is_online')->count();
        $Items = Item::count();
        $topitems = DB::select('select item_id, count(item_id),fs_items.name
        from fs_order_items
        JOIN fs_items ON fs_items.id=fs_order_items.item_id
        group by item_id ORDER BY count(item_id) DESC LIMIT 5');
        $list_orders = Order::select('id','amount','recived','in_process','in_delivery','deliverd')
            ->orderby('created_at','DESC')->get()->take(5);

        $DailyRevenue = DB::select("SELECT sum(amount) as amount FROM `fs_orders` WHERE DATE_FORMAT(created_at,'%Y-%m-%d') = DATE_FORMAT(now(),'%Y-%m-%d')");


        $OrdersOverview = DB::select('SELECT recived,in_process,in_delivery,deliverd,CASE WHEN deliverd = 1 THEN "deliverd" WHEN in_delivery = 1 THEN "in delivery" WHEN in_process = 1 THEN "in process" ELSE "Shoping" END FROM `fs_orders`;');

        $countShoping = DB::select('SELECT count(recived) as recived  FROM `fs_orders` WHERE recived = 0 and in_process = 0 and in_delivery = 0 and deliverd = 0;');

        $countrecived = DB::select('SELECT count(recived) as recived FROM `fs_orders` WHERE recived = 1 and in_process = 0 and in_delivery = 0 and deliverd = 0;');

        $countin_process = DB::select('SELECT count(in_process) as in_process FROM `fs_orders` WHERE recived = 1 and in_process = 1 and in_delivery = 0 and deliverd = 0;');

        $countin_delivery = DB::select('SELECT count(in_delivery) as in_delivery FROM `fs_orders` WHERE recived = 1 and in_process = 1 and in_delivery = 1 and deliverd = 0;');

        $countdeliverd = DB::select('SELECT count(deliverd) as deliverd FROM `fs_orders` WHERE recived = 1 and in_process = 1 and in_delivery = 1 and deliverd = 1;');

        $CurrentUsers = DB::select("SELECT * FROM `fs_users` WHERE `role_id` = '1'");

       $SoldbyItems =
       DB::select("SELECT fs_items.name as name,fs_order_items.quantity as quantity FROM `fs_items` join fs_order_items on `fs_items`.id = fs_order_items.item_id limit 5");

       $RecentOrders
       = DB::select("SELECT CASE WHEN deliverd = 1 THEN 'deliverd' WHEN in_delivery = 1 THEN 'in delivery' WHEN in_process = 1 THEN 'in process' ELSE 'Shoping' END,
       
       fs_order_items.order_id as order_id ,fs_items.name as name,fs_order_items.quantity as quantity,fs_orders.amount as amount,fs_order_items.created_at as created_at,fs_order_items.unit_price FROM fs_order_items join fs_items on fs_order_items.item_id = fs_items.id join fs_orders on fs_order_items.order_id = fs_orders.id  limit 5 ");

        
       $NewCustomers = DB::select("SELECT `image_path`,`full_name`,created_at FROM `fs_users` WHERE full_name IS NOT NULL order by created_at DESC LIMIT 3");

       /* TO DO Make Get Max Product Sale */
       $TopProducts = DB::select("SELECT fs_order_items.order_id,fs_items.name,fs_order_items.quantity,fs_order_items.created_at,fs_order_items.unit_price FROM fs_order_items join fs_items on fs_order_items.item_id = fs_items.id ORDER by fs_order_items.item_id limit 3");


        return view('admin.pages.dashboard', compact('countdeliverd','countin_delivery','countin_process','countrecived','countShoping','Orders','User','is_online','Items','topitems','list_orders','DailyRevenue','OrdersOverview','CurrentUsers','SoldbyItems','RecentOrders','NewCustomers','TopProducts'));

    } catch (\Exception $ex) {
        $log = Log::saveLog(['message' => $ex->getMessage()], get_class($this), __FUNCTION__);
        
        }
    }
}
