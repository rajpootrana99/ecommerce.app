@extends('layouts.base')

@section('content')
    <!-- Page Content -->
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
                                <li class="breadcrumb-item active">Create</li>
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
                    <form method="post" action="{{route('productGallery.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Product Image</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="product_id" class="col-sm-2 col-form-label text-right">Madel Name</label>
                                        <div class="col-sm">
                                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="product_id">
                                                <option value="">Select Product Model</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->model_name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('product_id') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end card-body-->
                        <div class="card-header">
                            <h4 class="card-title">Product Image</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <input type="file" id="input-file-now" name="product_image" class="dropify" />
                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('product_image') }}</div>
                        </div><!--end card-body-->
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="col-sm text-right ml-auto">
                                <button type="submit" class="btn btn-soft-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection
