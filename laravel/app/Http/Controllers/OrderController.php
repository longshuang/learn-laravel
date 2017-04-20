<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderShipped;



class OrderController extends Controller
{
    //
    public function ship($orderid){

        $order = '123'.'123';

        event(new OrderShipped($order));
    }
}
