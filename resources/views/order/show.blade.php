@extends('layouts.base')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col">
                            <h4 class="page-title">Orders</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div><!--end row-->
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-body invoice-head">
                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm mr-1" height="24">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark" height="20">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light" height="20">
                                <p class="mt-2 mb-0 text-muted">If account is not paid within 7 days the credits details supplied as confirmation.</p>
                            </div><!--end col-->
                            <div class="col-md-8">

                                <ul class="list-inline mb-0 contact-detail float-right">
                                    <li class="list-inline-item">
                                        <div class="pl-3">
                                            <i class="mdi mdi-web"></i>
                                            <p class="text-muted mb-0">www.abcdefghijklmno.com</p>
                                            <p class="text-muted mb-0">www.qrstuvwxyz.com</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="pl-3">
                                            <i class="mdi mdi-phone"></i>
                                            <p class="text-muted mb-0">+123 123456789</p>
                                            <p class="text-muted mb-0">+123 123456789</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="pl-3">
                                            <i class="mdi mdi-map-marker"></i>
                                            <p class="text-muted mb-0">2821 Kensington Road,</p>
                                            <p class="text-muted mb-0">Avondale Estates, GA 30002 USA.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="">
                                    <h6 class="mb-0"><b>Order Date :</b> {{ $order->order_date }}</h6>
                                    <h6><b>Order ID :</b> # {{ $order->id }}</h6>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-3">
                                <div class="float-left">
                                    <address class="font-13">
                                        <strong class="font-14">Billed To :</strong><br>
                                        {{ $order->user->first_name }} {{ $order->user->last_name }}<br>
                                        {{ $address->address }}<br>
                                        {{ $address->area }}, {{ $address->city }}<br>
                                        <abbr title="Phone">P:</abbr> {{ $order->user->phone }}
                                    </address>
                                </div>
                            </div><!--end col-->
                            <div class="col-md-3">
                                <div class="">
                                    <address class="font-13">
                                        <strong class="font-14">Shipped To:</strong><br>
                                        {{ $order->user->first_name }} {{ $order->user->last_name }}<br>
                                        {{ $address->address }}<br>
                                        {{ $address->area }}, {{ $address->city }}<br>
                                        <abbr title="Phone">P:</abbr> {{ $order->user->phone }}
                                    </address>
                                </div>
                            </div> <!--end col-->
                        </div><!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th class="col-md-8">Products</th>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Qty</th>
                                            <th>Rate</th>
                                            <th>Subtotal</th>
                                        </tr><!--end tr-->
                                        </thead>
                                        <tbody>
                                        <?php $total = 0; ?>
                                        @foreach($order->products as $product)
                                        <tr>
                                            <td>
                                                <h5 class="mt-0 mb-1 font-14">{{ $product->category->category_name }} {{ $product->model_name }}</h5>
                                                <p class="mb-0 text-muted">{{ $product->description }}</p>
                                            </td>
                                            <td>{{ $product->pivot->size }}</td>
                                            <td>{{ $product->pivot->color }}</td>
                                            <td>{{ $product->pivot->qty }}</td>
                                            <td>{{ $product->sale_price }}</td>
                                            <td>{{ $product->pivot->total }}</td>
                                        </tr><!--end tr-->
                                            <?php $total += $product->sale_price*$product->pivot->qty ?>
                                        @endforeach

                                        <tr>
                                            <td colspan="2" class="border-0"></td>
                                            <td class="border-0 font-14 text-dark"><b>Sub Total</b></td>
                                            <td class="border-0 font-14 text-dark"><b>{{ number_format($order->pivot->sum('total'), 2) }}</b></td>
                                        </tr><!--end tr-->
                                        <tr>
                                            <th colspan="2" class="border-0"></th>
                                            <td class="border-0 font-14 text-dark"><b>Tax Rate</b></td>
                                            <td class="border-0 font-14 text-dark"><b>0.00%</b></td>
                                        </tr><!--end tr-->
                                        <tr class="bg-black text-white">
                                            <th colspan="2" class="border-0"></th>
                                            <td class="border-0 font-14"><b>Total</b></td>
                                            <td class="border-0 font-14"><b>{{ $total }}</b></td>
                                        </tr><!--end tr-->
                                        </tbody>
                                    </table><!--end table-->
                                </div>  <!--end /div-->
                            </div>  <!--end col-->
                        </div><!--end row-->

                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <h5 class="mt-4">Terms And Condition :</h5>
                                <ul class="pl-3">
                                    <li><small class="font-12">All accounts are to be paid within 7 days from receipt of invoice. </small></li>
                                    <li><small class="font-12">To be paid by cheque or credit card or direct payment online.</small ></li>
                                    <li><small class="font-12"> If account is not paid within 7 days the credits details supplied as confirmation of work undertaken will be charged the agreed quoted fee noted above.</small></li>
                                </ul>
                            </div> <!--end col-->
                            <div class="col-lg-6 align-self-end">
                                <div class="float-right" style="width: 30%;">
                                    <small>Account Manager</small>
                                    <img src="assets/images/signature.png" alt="" class="mt-2 mb-1" height="26">
                                    <p class="border-top">Signature</p>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-4 ml-auto align-self-center">
                                <div class="text-center"><small class="font-12">Thank you very much for doing business with us.</small></div>
                            </div><!--end col-->
                            <div class="col-lg-12 col-xl-4">
                                <div class="float-right d-print-none">
                                    <a href="javascript:window.print()" class="btn btn-soft-info btn-sm">Print</a>
                                    <a href="#" class="btn btn-soft-primary btn-sm">Submit</a>
                                    <a href="#" class="btn btn-soft-danger btn-sm">Cancel</a>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
@endsection
