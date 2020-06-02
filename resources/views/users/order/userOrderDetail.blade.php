<div>
    Chi tiết lịch sử order tại order thứ {{$allUserOrderDetail[0]->id_oder}}
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>id_oder_detail</th>
            <th>STT</th>
            <th>id_oder</th>
            <th>id_product</th>
            <th>Số lượng</th>
            <th>Khuyến mại</th>
            <th>Số tháng thuê</th>
            <th>Đối tác vận chuyển</th>
            <th>Cọc</th>
            <th>Ngày trả hàng</th>
            <th>Trả hàng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allUserOrderDetail as $eachUserOrderDetail)
            <tr>
                <td>{{ $eachUserOrderDetail->id_oder_detail }}</td>
                <td>{{ $eachUserOrderDetail->item_order }}</td>
                <td>{{ $eachUserOrderDetail->id_oder }}</td>
                <td>{{ $eachUserOrderDetail->id_product }}</td>
                <td>{{ $eachUserOrderDetail->quantity }}</td>
                <td>{{ $eachUserOrderDetail->discount }}</td>
                <td>{{ $eachUserOrderDetail->months }}</td>
                <?php
                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$eachUserOrderDetail->id_partner_delivery)->get()->first();
                ?>
                <td>{{$delivery ->name }}</td>
                <td>{{ $eachUserOrderDetail->deposit }}</td>
                <td>{{ $eachUserOrderDetail->returned_date }}</td>
                <td><a href="{{URL::to('/user-return-product/'.$eachUserOrderDetail->id_oder_detail)}}">Đăng ký trả đồ</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

