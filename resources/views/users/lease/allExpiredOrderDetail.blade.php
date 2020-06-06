<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View All Expired' Orders</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id_oder_detail</th>
                            <th>STT</th>
                            <th>id_oder</th>
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
                        @foreach($allExpiredOrderDetail as $eachExpiredOrderDetail)
                            <tr>
                                <td>{{ $eachExpiredOrderDetail->id_oder_detail }}</td>
                                <td>{{ $eachExpiredOrderDetail->item_order }}</td>
                                <td>{{ $eachExpiredOrderDetail->id_oder }}</td>
                                <td><?php
                                    $tensp = DB::table('product')->where('id_product',$eachExpiredOrderDetail->id_product )->get()->first();
                                    ?>
                                    {{ $tensp->name }}</td>
                                <td>{{ $eachExpiredOrderDetail->quantity }}</td>
                                <td>{{ $eachExpiredOrderDetail->discount }}</td>
                                <td>{{ $eachExpiredOrderDetail->months }}</td>
                                <?php
                                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$eachExpiredOrderDetail->id_partner_delivery)->get()->first();
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
