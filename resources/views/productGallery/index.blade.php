@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Product Image</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Image</a></li>
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
                        <div class="card-title mt-4">Product Image
                            <a href="{{ route('productGallery.create') }}" class="btn btn-primary" style="float:right;margin-left: 10px"><i class="fa fa-plus"></i> New Product Image </a>
                        </div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Model Name</th>
                                    <th>Product Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($productGalleries as $productGallery)
                                    <tr role="row">
                                        <td >{{ $productGallery->id }}</td>
                                        <td>{{ $productGallery->product->model_name }}</td>
                                        <td><img style="height: 50px; width: 50px;" src="{{ asset('storage/'.$productGallery->product_image) }}"></td>
                                        <td >
                                            <div class="row">
                                                <a href="{{ route('productGallery.edit', ['productGallery' => $productGallery]) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form id="{{ 'delete_'.$productGallery->id }}" method="post" action="{{ route('productGallery.destroy', ['productGallery' => $productGallery]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a onclick="document.getElementById('{{ 'delete_'.$productGallery->id }}').submit()" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View">
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
