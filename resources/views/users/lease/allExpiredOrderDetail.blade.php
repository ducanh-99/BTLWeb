@extends('welcome')
@section('lease')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="breadcrumbs">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Expired Order</li>
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
                    <h3 class="card-title">View All Expired' Orders</h3>
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
                    <a href="{{URL::to('/lease-all-product')}}">
                        <button type="button" class="btn btn-primary">Manage Product
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
                                <!-- <th>id_oder</th> -->
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
                            @foreach($allExpiredOrderDetail as $eachExpiredOrderDetail)
                            <tr>
                                <td>{{ $eachExpiredOrderDetail->id_oder_detail }}</td>
                                <td>{{ $eachExpiredOrderDetail->item_order }}</td>
                                <!-- <td>{{ $eachExpiredOrderDetail->id_oder }}</td> -->
                                <td><?php
                                    $tensp = DB::table('product')->where('id_product', $eachExpiredOrderDetail->id_product)->get()->first();
                                    ?>
                                    {{ $tensp->name }}</td>
                                <td>{{ $eachExpiredOrderDetail->quantity }}</td>
                                <td>{{ $eachExpiredOrderDetail->discount }}</td>
                                <td>{{ $eachExpiredOrderDetail->months }}</td>
                                <?php
                                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery', $eachExpiredOrderDetail->id_partner_delivery)->get()->first();
                                ?>
                                <td>{{$delivery ->name }}</td>
                                <td>{{ $eachExpiredOrderDetail->deposit }}</td>
                                <td>{{ $eachExpiredOrderDetail->returned_date }}</td>
                                <td>{{ $eachExpiredOrderDetail->shipping_fee }}</td>

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
