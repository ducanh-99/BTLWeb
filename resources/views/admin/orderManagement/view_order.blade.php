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
                                <th>id_oder</th>
                                <th>id_customer</th>
                                <th>Ngày đặt hàng</th>
                                <th>Phê duyệt</th>
                                <th>Ghi chú</th>
                                <th>Xem chi tiết</th>
                                <th>Tỉnh nơi nhận hàng</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allOrder as $eachOrder)
                                <tr>
                                    <td>{{ $eachOrder->id_oder }}</td>
                                    <td>{{ $eachOrder->id_customer }}</td>
                                    <td>{{ $eachOrder->date }}</td>
                                    <td>{{ $eachOrder->isapproved }}

                                        <?php
                                        if($eachOrder->isapproved == 0){    //chưa duyệt
                                        ?>

                                        <a href="{{URL::to('/approve-order/'.$eachOrder->id_oder)}}">Duyệt</a>
                                        <a href="{{URL::to('/unapprove-order/'.$eachOrder->id_oder)}}">Hủy</a>

                                        <?php
                                        }else if($eachOrder->isapproved == 1){ //đã duyệt
                                        ?>
                                        <h3>Đang giao</h3>
                                        <a href="{{URL::to('/succeed-order/'.$eachOrder->id_oder)}}">Giao thành công</a>

                                        <?php
                                        } else if($eachOrder->isapproved == 2){ //giao thành công
                                        ?>

                                        <p>Đã giao hàng thành công</p>

                                        <?php
                                        }  else if($eachOrder->isapproved == 3){ //bị hủy
                                        ?>

                                        <p>Đơn hàng bị hủy</p>

                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>{{ $eachOrder->note }}</td>
                                    <td><a href="{{URL::to('/view-order-detail/'.$eachOrder->id_oder)}}">Xem chi
                                            tiết</a></td>
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
