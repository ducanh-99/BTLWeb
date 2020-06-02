<?php
    //hiển thị tất cả các sản phẩm bên cho thuê có id_customer đã và đang cho thuê
?>
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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id_oder_detail</th>
                                <th>STT</th>
                                <th>Người đặt hàng</th>
                                <th>product</th>
                                <th>Số lượng</th>
                                <th>Giảm giá</th>
                                <th>Số tháng thuê</th>
                                <th>Đối tác vận chuyển</th>
                                <th>Đặt Cọc</th>
                                <th>Ngày trả đồ</th>
                                <th>Phí ship</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allOrderDetail as $eachOrderDetail)
                                <tr>
                                    <td>{{ $eachOrderDetail->id_oder_detail }}</td>
                                    <td>{{ $eachOrderDetail->item_order }}</td>
                                    <?php
                                    $Order = DB::table('oder')->where('id_oder',$eachOrderDetail->id_oder)->get()->first();
                                    $Custome = DB::table('customer')->where('id_customer',$Order->id_customer)->get()->first();
                                    ?>
                                    <td>{{ $Custome->name }}</td>
                                    <?php
                                    $sp = DB::table('product')->where('id_product',$eachOrderDetail->id_product)->get()->first();
                                    ?>
                                    <td>{{ $sp->name }}</td>
                                    <td>{{ $eachOrderDetail->quantity }}</td>
                                    <td>{{ $eachOrderDetail->discount }}</td>
                                    <td>{{ $eachOrderDetail->months }}</td>
                                    <?php
                                    $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$eachOrderDetail->id_partner_delivery)->get()->first();
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
