@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Products</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Products</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-4">Products
                            <a href="{{ route('product.create') }}" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Product </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Model</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Size</th>
                                    <th>Company</th>
                                    <th>Color</th>
                                    <th>Sale Price</th>
                                    <th>Cost Price</th>
                                    <th>Quantity</th>
                                    <th>Stock</th>
                                    <th>Popular</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr role="row">
                                        <td >{{ $product->id }}</td>
                                        @if(isset($product->productGalleries()->latest()->first()->product_image))
                                        <td><img class="avatar-box" width="50px" height="50px" src="{{ asset('storage/'.$product->productGalleries()->latest()->first()->product_image) }}"></td>>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>{{ $product->model_name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>@foreach($product->sizes as $size)
                                                <span class="badge badge-info">{{ $size->size_name }}</span>
                                            @endforeach</td>
                                        @if(isset($product->company->company_name))
                                            <td>{{ $product->company->company_name }}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>@foreach($product->colors as $color)
                                                <i class="fa fa-circle" style="color: {{ $color->color_name }}"></i></span>
                                            @endforeach</td>
                                        <td>{{ $product->sale_price }}</td>
                                        <td>{{ $product->cost_price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>@if($product->qty<1)
                                            <span class="badge badge-danger">Out of Stock</span>
                                            @else
                                            <span class="badge badge-success">In Stock</span>
                                            @endif</td>
                                        <td><div class="text-center">
                                            @if($product->is_popular == 'Popular')
                                                <form id="{{ 'notPopular_'.$product->id }}" method="post" action="{{ route('product.updatePopular', ['product' => $product]) }}">
                                                    @method('PATCH')
                                                    @csrf
                                                        <input type="checkbox" name="is_popular" value="0" onchange="document.getElementById('{{ 'notPopular_'.$product->id }}').submit()" checked>
                                                </form>
                                            @endif
                                            @if($product->is_popular == 'Not Popular')
                                                <form id="{{ 'popular_'.$product->id }}" method="post" action="{{ route('product.updatePopular', ['product' => $product]) }}">
                                                    @method('PATCH')
                                                    @csrf
                                                        <input type="checkbox" name="is_popular" value="1" onchange="document.getElementById('{{ 'popular_'.$product->id }}').submit()">
                                                </form>
                                            @endif
                                            </div>
                                        </td>
                                        <td >
                                            <div class="row">
                                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form id="{{ 'delete_'.$product->id }}" method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a onclick="document.getElementById('{{ 'delete_'.$product->id }}').submit()" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table><!--end /table-->
                        </div><!--end /tableresponsive-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
@endsection
