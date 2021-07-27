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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
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
                        <div class="card-title mt-4">Orders</div>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Name</th>
                                    <th>Order Date</th>
                                    <th>Payment Method</th>
                                    <th>Total</th>
                                    <th>Order Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr role="row">
                                        <td><a href="{{ route('order.show', ['order' => $order ]) }}">{{ $order->id }}</a></td>
                                        <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>
                                        @if($order->order_status == 'Confirmed')
                                            <span class="badge badge-soft-success">{{ $order->order_status }}</span>
                                        @endif
                                        @if($order->order_status == 'Rejected')
                                            <span class="badge badge-soft-danger">{{ $order->order_status }}</span>
                                        @endif
                                        @if($order->order_status == 'Pending')
                                            <span class="badge badge-soft-info">{{ $order->order_status }}</span>
                                        @endif
                                        </td>
                                        <td class="text-left">
                                            <div class="dropdown d-inline-block">
                                                <a class="dropdown-toggle arrow-none" id="dLabel11" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                    <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dLabel11">
                                                    @if($order->order_status != 'Rejected')
                                                        <form id="{{ 'reject_'.$order->id }}" method="post" action="{{ route('order.updateStatus', ['order' => $order]) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="order_status" value="2">
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="document.getElementById('{{'reject_'.$order->id}}').submit()">Reject</a>
                                                        </form>
                                                    @endif
                                                    @if($order->order_status != 'Confirmed')
                                                        <form id="{{ 'confirm_'.$order->id }}" method="post" action="{{ route('order.updateStatus', ['order' => $order]) }}">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="order_status" value="1">
                                                            <a class="dropdown-item" style="cursor: pointer;" onclick="document.getElementById('{{'confirm_'.$order->id}}').submit()">Confirmed</a>
                                                        </form>
                                                    @endif
                                                </div>
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
