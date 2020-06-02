<div>Trang Xác nhận trả đồ cho người dùng</div>
<div>
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
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $chiTiet->id_oder_detail }}</td>
                <td>{{ $chiTiet->item_order }}</td>
                <td>{{ $chiTiet->id_oder }}</td>
                <td>{{ $chiTiet->id_product }}</td>
                <td>{{ $chiTiet->quantity }}</td>
                <td>{{ $chiTiet->discount }}</td>
                <td>{{ $chiTiet->months }}</td>
                <?php
                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$chiTiet->id_partner_delivery)->get()->first();
                ?>
                <td>{{$delivery ->name }}</td>
                <td>{{ $chiTiet->deposit }}</td>
                <td>{{ $chiTiet->returned_date }}</td>
            </tr>
        </tbody>
    </table>
    <p>{{$msg}}</p>
    <p>{{$returnFee}}</p>

    <form action="{{URL::to('/user-submit-return-product')}}" method="GET">
        <button type="submit" value="Xác nhận" name="btnSubmit" id="btnSubmit">Xác nhận</button>
        <input type="hidden" name="chiTietID" value="{{$chiTiet->id_oder_detail}}">
        <input type="hidden" name="tongQuatID" value="{{$tongQuat->id_oder}}">
        <input type="hidden" name="goodsID" value="{{$goods->id_product}}">
    </form>

</div>
