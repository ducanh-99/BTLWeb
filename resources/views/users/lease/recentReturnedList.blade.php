<?php
    //hiển thị các danh mục mà người dùng vừa mới trả lại, chưa được bên cho thuê kiểm duyệt chất lượng hàng hóa
?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View All {{DB::table('customer')->where('id_customer',Session::get('id_lease'))->get()->first()->name}}'
                        Recent Returned Orders List</h3>
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
                            <th>Tình trạng sản phẩm</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recentReturnedList as $eachReturnedItem)
                            <tr>
                                <td>{{ $eachReturnedItem->id_oder_detail }}</td>
                                <td>{{ $eachReturnedItem->item_order }}</td>
                                <?php
                                $Order = DB::table('oder')->where('id_oder',$eachReturnedItem->id_oder)->get()->first();
                                $Custome = DB::table('customer')->where('id_customer',$Order->id_customer)->get()->first();
                                ?>
                                <td>{{ $Custome->name }}</td>
                                <?php
                                $sp = DB::table('product')->where('id_product',$eachReturnedItem->id_product)->get()->first();
                                ?>
                                <td>{{ $sp->name }}</td>
                                <td>{{ $eachReturnedItem->quantity }}</td>
                                <td>{{ $eachReturnedItem->discount }}</td>
                                <td>{{ $eachReturnedItem->months }}</td>
                                <?php
                                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$eachReturnedItem->id_partner_delivery)->get()->first();
                                ?>
                                <td>{{$delivery ->name }}</td>
                                <td>{{ $eachReturnedItem->deposit }}</td>
                                <td>{{ $eachReturnedItem->returned_date }}</td>
                                <td>{{ $eachReturnedItem->shipping_fee }}</td>
                                <td>
                                    <form action="{{URL::to('/lease-update-outlook')}}" method="GET">
                                        <input type="hidden" name="id_oder_detail" value="{{$eachReturnedItem->id_oder_detail}}">
                                        <input type="hidden" name="id_product" value="{{$sp->id_product}}">
                                        <input type="number" name="outlook" id="outlook" value="{{$sp->outlook}}">
                                    <button type="submit" name="outlookSubmit" class="btn btn-info">Cập nhật tình trạng sản phẩm</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
