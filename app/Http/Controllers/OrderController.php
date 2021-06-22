<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function makeOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'payment_method' => 'required',
            'product_id' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
            return collect([
                'status' => false,
                'message' => $message->first()
            ]);
        }
        try {
            $order = Order::create([
                'user_id' => $request->user_id,
                'order_date' => date("Y/m/d"),
                'payment_method' => $request->payment_method,
            ]);
            $order->products()->attach($request->product_id);
            return response([
                'status' => true,
                'message' => 'Order Created Successfully',
                'data' => $order,
            ]);
        }catch (\Exception $exception){
            return response([
                'status' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}
