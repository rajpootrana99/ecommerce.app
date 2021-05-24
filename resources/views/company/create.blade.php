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
                            <h4 class="page-title">Company</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Company</a></li>
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
                    <form method="post" action="{{route('company.store')}}">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Company</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="company_name" class="col-sm-2 col-form-label text-right">Company Name</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="text" value="{{ old('company_name') }}" name="company_name" id="validatedCustomFile" placeholder="Company Name">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('company_name') }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="company_phone" class="col-sm-2 col-form-label text-right">Phone Number</label>
                                        <div class="col-sm">
                                            <input class="form-control" type="text" value="{{ old('company_phone') }}" name="company_phone" id="validatedCustomFile" placeholder="Phone Number">
                                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('company_phone') }}</div>
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
