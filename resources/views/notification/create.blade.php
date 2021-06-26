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
                            <h4 class="page-title">Notification</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Notification</a></li>
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
                    <form method="post" action="{{route('notification.store')}}" >
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Notification</h4>
                        </div><!--end card-header-->
                        <div class="card-body">
                            <label class="mb-2">Notification</label>
                            <textarea id="textarea" class="form-control" name="message" maxlength="225" rows="7" placeholder="This textarea has a limit of 225 chars."></textarea>
                            <div style="color: #ff0000; font-size: x-small; margin-top: 3px;">{{ $errors->first('message') }}</div>
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
