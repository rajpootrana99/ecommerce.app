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
                            <h4 class="page-title">Deals</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Deals</a></li>
                                <li class="breadcrumb-item active">Edit</li>
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
                    <form method="post" action="{{route('deal.update', ['deal' => $deal])}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Deal</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <img src="{{ asset('storage/'.$deal->image) }}" style="height: 300px; width: auto" alt="" class="img-fluid mb-3">
                            <div class="custom-file mb-3">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('image') }}</div>
                        </div><!--end card-body-->
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="col-sm text-right ml-auto">
                                <button type="submit" class="btn btn-soft-primary waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection
