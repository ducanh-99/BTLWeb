@extends('welcome')
@section('lease')
<?php
//hiển thị tất cả các sản phẩm bên cho thuê có id_customer đã và đang cho thuê
?>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="breadcrumbs">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item">All products have been rented</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View All {{DB::table('customer')->where('id_customer',Session::get('id_lease'))->get()->first()->name}}'
                        Lease Orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a href="{{URL::to('/lease-view-order-detail')}}">
                        <button type="button" class="btn btn-primary">Leased
                        </button>
                    </a>
                    <a href="{{URL::to('/lease-recent-returned-list')}}">
                        <button type="button" class="btn btn-primary">Recent Returned
                        </button>
                    </a>
                    <a href="{{URL::to('/lease-update-outlook')}}">
                        <button type="button" class="btn btn-primary">Update outlook
                        </button>
                    </a>
                    <a href="{{URL::to('/lease-all-expired-order-detail')}}">
                        <button type="button" class="btn btn-primary">Expired Order
                        </button>
                    </a>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id_oder_detail</th>
                                <th>STT</th>
                                <th>Orderer</th>
                                <th>product</th>
                                <th>Amount</th>
                                <th>Discount</th>
                                <th>Number of months rented</th>
                                <th>Shipping partner</th>
                                <th>Deposit</th>
                                <th>Date return</th>
                                <th>Ship fee</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allOrderDetail as $eachOrderDetail)
                            <tr>
                                <td>{{ $eachOrderDetail->id_oder_detail }}</td>
                                <td>{{ $eachOrderDetail->item_order }}</td>
                                <?php
                                $Order = DB::table('oder')->where('id_oder', $eachOrderDetail->id_oder)->get()->first();
                                $Custome = DB::table('customer')->where('id_customer', $Order->id_customer)->get()->first();
                                ?>
                                <td>{{ $Custome->name }}</td>
                                <?php
                                $sp = DB::table('product')->where('id_product', $eachOrderDetail->id_product)->get()->first();
                                ?>
                                <td>{{ $sp->name }}</td>
                                <td>{{ $eachOrderDetail->quantity }}</td>
                                <td>{{ $eachOrderDetail->discount }}</td>
                                <td>{{ $eachOrderDetail->months }}</td>
                                <?php
                                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery', $eachOrderDetail->id_partner_delivery)->get()->first();
                                ?>
                                <td>{{$delivery ->name }}</td>
                                <td>{{ $eachOrderDetail->deposit }}</td>
                                <td>{{ $eachOrderDetail->returned_date }}</td>
                                <td>{{ $eachOrderDetail->shipping_fee }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection