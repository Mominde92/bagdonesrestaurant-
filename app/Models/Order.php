<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Order extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'amount',
        'tax',
        'delivery_fee',
        'total_amount',

        'recived',
        'in_process',
        'in_delivery',
        'deliverd',

        'city',
        'area',

        'street_n',
        'building_n',
        'floor_n',
        'appartment_n',

        'phone_number',
        'gps_link',
        'device_type',
        'device_token',
        'customer_note'
    ];

    public function items()
    {
            return $this->belongsToMany(Item::class, OrderItems::class)->withPivot('quantity' , 'unit_price');;
   
    }

  

    public function setRecived(){
        $this->recived = 1;
        $this->save();
        return;

    }
    public function setInProcess(){
        $this->in_process = 1;
        $this->save();
        return;

    }
    public function setInDelivery(){
        $this->in_delivery = 1;
        $this->save();
        return;
    }
    public function setDeliverd(){
        $this->deliverd = 1;
        $this->save();
        return;
    }
}
