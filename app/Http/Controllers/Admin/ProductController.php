<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Company;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $colors = Color::all();
        $sizes = Size::all();
        $categories = Category::all();
        return view('product.create', [
            'companies' => $companies,
            'colors' => $colors,
            'sizes' => $sizes,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $check = request()->validate([
            'size_id' => 'required',
            'color_id' => 'required',
        ]);
        $product = Product::create($request->all());
        $product->sizes()->attach(request()->size_id);
        $product->colors()->attach(request()->color_id);
        return redirect(route('product.index'));
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
        $companies = Company::all();
        $colors = Color::all();
        $sizes = Size::all();
        $categories = Category::all();
        return view('product.edit', [
            'companies' => $companies,
            'colors' => $colors,
            'sizes' => $sizes,
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->sizes()->detach($product->size_id);
        $product->colors()->detach($product->color_id);
        $product->delete();
        return redirect(route('product.index'));
    }
}
