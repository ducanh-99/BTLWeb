@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View All Users' Orders</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Index</th>
                                <th>ID Oder Detail</th>
                                <th>ID Oder</th>
                                <th>Product</th>
                                <th>Amout</th>
                                <th>Discount</th>
                                <th>Rental period</th>
                                <th>Delivery</th>
                                <th>Deposit</th>
                                <th>Due date</th>
                                <th>Fee ship</th>
                                <th>Edit</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allOrderDetail as $eachOrderDetail)
                                <tr>
                                    <td>{{ $eachOrderDetail->item_order }}</td>
                                    <td>{{ $eachOrderDetail->id_oder_detail }}</td>
                                    <td>{{ $eachOrderDetail->id_oder }}</td>
                                    <td>
                                        <?php
                                        $sp = DB::table('product')->where('id_product',$eachOrderDetail->id_product)->get()->first();
                                        ?>
                                            {{$sp->name}}
                                    </td>
                                    <td>{{ $eachOrderDetail->quantity }}</td>
                                    <td>{{ $eachOrderDetail->discount }}</td>
                                    <td>{{ $eachOrderDetail->months }} months</td>
                                    <?php
                                    $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$eachOrderDetail->id_partner_delivery)->get()->first();
                                    ?>
                                    <td>{{$delivery ->name }}</td>
                                    <td>{{ $eachOrderDetail->deposit }}</td>
                                    <td>{{ $eachOrderDetail->returned_date }}</td>
                                    <td>{{ $eachOrderDetail->shipping_fee }}</td>
                                    <td><a href="{{URL::to('/edit-order-detail/'.$eachOrderDetail->id_oder_detail)}}">Edit</a></td>
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
