<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category', 'sizes', 'company', 'colors', 'productGalleries')->get();
        return response([
            'status' => true,
            'data' => $products,
        ]);
    }

    public function search(Request $request){
        if ($request->search){
            $search = $request->input('search');
            $products = Product::with('category', 'sizes', 'colors', 'company', 'productGalleries')
                ->whereHas('category', function ($query) use ($search){
                $query->where('category_name', 'like', '%'.$search.'%');
            })->orWhere('model_name', 'like', '%'.$search.'%')->get();
            return response([
                'status' => true,
                'data' => $products,
            ]);
        }
        else {
            return response([
                'status' => false,
                'data' => Product::all(),
            ]);
        }
    }

    public function addToFavourite(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $product->users()->attach(Auth::id());
        return response([
            'status' => true,
            'message' => 'Add to Favourite'
        ]);
    }

    public function getFavourite(){
        $user = Auth::user();
        $products = $user->products()->with('category', 'sizes', 'company', 'colors', 'productGalleries')->get();
        return response([
            'status' => true,
            'data' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
