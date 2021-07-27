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
        $product = Product::where('id', $request->product_id)->first();
        if(!$order){
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'qty' => 'required',
                'size' => 'required',
                'color' => 'required',
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
                    'total' => $product->sale_price*$request->qty,
                ]);
                $order->products()->attach($request->product_id, [
                    'qty' => $request->qty,
                    'size' => $request->size,
                    'color' => $request->color,
                    'total' => $product->sale_price*$request->qty,
                ]);
                $cart = Order::with( 'products.category', 'products.company', 'products.productGalleries')->where('user_id', Auth::id())
                    ->where('order_type', 0)->first();
                return response([
                    'status' => true,
                    'message' => 'Product add to cart',
                    'data' => $cart,
                ]);
            }catch (\Exception $exception){
                return response([
                    'status' => false,
                    'message' => $exception->getMessage(),
                ]);
            }
        }
        else{
            $total = $order->total + $product->sale_price*$request->qty;
            $product = Product::where('id', $request->product_id)->first();
            $order->update([
                'total' => $total,
            ]);
            if($product){
                $pro = $product->orders()->first();
                if ($pro){
                    if ($pro->pivot->size == $request->size && $pro->pivot->color == $request->color){
                        $qty = $pro->pivot->qty + $request->qty;
                        $product->orders()->detach($product->order_id);
                        $order->products()->attach($request->product_id, [
                            'qty' => $qty,
                            'size' => $request->size,
                            'color' => $request->color,
                            'total' => $product->sale_price*$qty,
                        ]);
                    }
                }
                else{
                    $order->products()->attach($request->product_id, [
                        'qty' => $request->qty,
                        'size' => $request->size,
                        'color' => $request->color,
                        'total' => $product->sale_price*$request->qty,
                    ]);
                }
            }
            $cart = Order::with( 'products.category', 'products.company', 'products.productGalleries')->where('user_id', Auth::id())
                ->where('order_type', 0)->first();
            return response([
                'status' => true,
                'message' => 'Product add to cart',
                'data' => $cart,
            ]);
        }
    }

    public function removeFromCart(Request $request){
        $order = Order::where('order_type', 0)->where('user_id', Auth::id())->first();
        $product = Product::where('id', $request->product_id)->first();
        $pro = $product->orders()->first();
        $total = $order->total - $pro->pivot->total;
        $order->update([
            'total' => $total,
        ]);
        $product->orders()->detach($product->order_id);
        $cart = Order::with('products.sizes', 'products.category', 'products.colors', 'products.company', 'products.productGalleries')->where('user_id', Auth::id())
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
