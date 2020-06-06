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
                                <th>ID Oder</th>
                                <th>Customer</th>
                                <th>Order Date</th>
                                <th>Approve</th>
                                <th>Note</th>
                                <th>See Details</th>
                                <th>Delivery Location</th>
                                <th>Total Cost</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allOrder as $eachOrder)
                                <tr>
                                    <td>{{ $eachOrder->id_oder }}</td>
                                    <td>
                                        <?php
                                        $cus = DB::table('customer')->where('id_customer',$eachOrder->id_customer)->get()->first();
                                        ?>

                                            {{$cus->name}}

                                    </td>
                                    <td>{{ $eachOrder->date }}</td>
                                    <td>

                                        <?php
                                        if($eachOrder->isapproved == 0){    //chưa duyệt
                                        ?>

                                        <a href="{{URL::to('/approve-order/'.$eachOrder->id_oder)}}">Approve</a>
                                        <a href="{{URL::to('/unapprove-order/'.$eachOrder->id_oder)}}">Cancel</a>

                                        <?php
                                        }else if($eachOrder->isapproved == 1){ //đã duyệt
                                        ?>
                                        <h3>Delivering</h3>
                                        <a href="{{URL::to('/succeed-order/'.$eachOrder->id_oder)}}">Successful Delivery</a>

                                        <?php
                                        } else if($eachOrder->isapproved == 2){ //giao thành công
                                        ?>

                                        <p>Has Delivered successfully</p>

                                        <?php
                                        }  else if($eachOrder->isapproved == 3){ //bị hủy
                                        ?>

                                        <p>Order canceled</p>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>{{ $eachOrder->note }}</td>
                                    <td><a href="{{URL::to('/view-order-detail/'.$eachOrder->id_oder)}}">See More</a></td>
                                    <?php
                                    $provin = DB::table('province')->where('id_province',$eachOrder->id_province)->get()->first();
                                    ?>
                                    <td>{{ $provin->name }}</td>
                                    <td>{{ $eachOrder->totalcost }}</td>

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
