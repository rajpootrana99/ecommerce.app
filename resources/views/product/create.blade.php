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
                            <h4 class="page-title">Product</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
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
                    <form method="post" action="{{route('product.store')}}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Product</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="model_name" class="col-sm-3 col-form-label text-right">Model Name</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="text" value="{{ old('model_name') }}" name="model_name" id="validatedCustomFile" placeholder="Model Name">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('model_name') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label text-right">Description</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="text" value="{{ old('description') }}" name="description" id="validatedCustomFile" placeholder="Description">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('description') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label text-right">Category</label>
                                        <div class="col-sm">
                                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="category_id">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('category_id') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label text-right">Size</label>
                                        <div class="col-sm">
                                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="size_id[]" multiple>
                                                <option value="">Select Size</option>
                                                @foreach($sizes as $size)
                                                    <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('size_id') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label text-right">Company</label>
                                        <div class="col-sm">
                                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="company_id">
                                                <option value="">Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('company_id') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label text-right">Color</label>
                                        <div class="col-sm">
                                            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="color_id[]" multiple>
                                                <option value="">Select Color</option>
                                                @foreach($colors as $color)
                                                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('color_id') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="sale_price" class="col-sm-3 col-form-label text-right">Sale Price</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="text" value="{{ old('sale_price') }}" name="sale_price" id="validatedCustomFile" placeholder="Sale Price">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('sale_price') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="cost_price" class="col-sm-3 col-form-label text-right">Cost Price</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="text" value="{{ old('cost_price') }}" name="cost_price" id="validatedCustomFile" placeholder="Cost Price">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('cost_price') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="cost_price" class="col-sm-3 col-form-label text-right">Quantity</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="number" value="{{ old('qty') }}" name="qty" id="validatedCustomFile" placeholder="Qty">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('qty') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
