<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function makeOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'payment_method' => 'required',
            'product_id' => 'required',
            'qty' => 'required',
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
            $order->products()->attach($request->product_id, ['qty' => $request->qty]);
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

    public function addToCart(Request $request){
        $order = Order::where('order_type', 0)->where('user_id', Auth::id())->first();
        if(!$order){
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'qty' => 'required',
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
                    'user_id' => Auth::id(),
                    'order_date' => date("Y/m/d"),
                ]);
                $order->products()->attach($request->product_id, ['qty' => $request->qty]);
                return response([
                    'status' => true,
                    'message' => 'Product add to cart',
                    'data' => $order,
                ]);
            }catch (\Exception $exception){
                return response([
                    'status' => false,
                    'message' => $exception->getMessage(),
                ]);
            }
        }
        else{
            $order->products()->attach($request->product_id, ['qty' => $request->qty]);
            return response([
                'status' => true,
                'message' => 'Product add to cart',
                'data' => $order,
            ]);
        }
    }

    public function removeFromCart(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $product->orders()->detach($product->order_id);
        $cart = Order::with('products')->where('user_id', Auth::id())
            ->where('order_type', 0)->first();
        return response([
            'status' => true,
            'message' => 'Product removed from cart',
            'data' => $cart,
        ]);
    }

    public function viewCart(){
        $order = Order::with('products.sizes', 'products.category', 'products.colors', 'products.company', 'products.productGalleries')->where('user_id', Auth::id())
            ->where('order_type', 0)->first();
        return response([
            'status' => true,
            'message' => 'Cart Items',
            'data' => $order,
        ]);
    }

    public function checkout(Request $request){
        $order = Order::where('order_type', 0)->where('user_id', Auth::id())->first();
        $order->update([
            'order_type' => 1,
            'payment_method' => $request->payment_method,
        ]);
        return response([
            'status' => true,
            'message' => 'order confirmed',
            'data' => $order,
        ]);
    }
}
