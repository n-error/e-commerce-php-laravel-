<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\Models\Payment;
use App\Models\Customer;

class OrderController extends Controller
{
    public function manage_order(){
        $orders=Order::all();
        return view('admin.order.manage_order',compact('orders'));
    }
    public function view_order($id){
        $orders=Order::where('orders.id',$id)->first();
        $order_by_id=OrderDetail::where('order_id',$id)->get();
        return view('admin.order.view_order',compact('orders','order_by_id'));
    }
}
