<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderDetail extends Model
{
    use HasFactory;

    private static $orderDetails;


    public static function newOrderDetails($order_id)
    {
        foreach (Cart::getContent() as $cartProduct) {
            self::$orderDetails = new OrderDetail();
            self::$orderDetails->order_id         = $order_id;
            self::$orderDetails->product_id       = $cartProduct->id;
            self::$orderDetails->product_name     = $cartProduct->name;
            self::$orderDetails->product_price    = $cartProduct->price;
            self::$orderDetails->product_image    = $cartProduct->attributes->image;
            self::$orderDetails->product_qty      = $cartProduct->quantity;
            self::$orderDetails->save();
        }
    }
}
