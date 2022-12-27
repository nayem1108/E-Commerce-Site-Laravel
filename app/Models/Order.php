<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Order extends Model
{
    use HasFactory;
    private static $order;

    public static function newOrder($delivery_address, $payment_method, $customer_id){
        
        self::$order  = new Order();
        self::$order->customer_id         = $customer_id;
        self::$order->amount              = Session::get('total_amount');
        self::$order->tax_amount          = Session::get('tax');
        self::$order->shipping_cost       = Session::get('shipping_cost');
        self::$order->delivery_address    = $delivery_address;
        self::$order->order_date          = date('Y-m-d');
        self::$order->order_timestamps    = strtotime(date('Y-m-d'));
        self::$order->payment_type        = $payment_method;
        self::$order->save();
        return self::$order->id;
    }
}
