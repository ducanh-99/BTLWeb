<div>
    Liệt kê Order Chi tiết
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
            <th>Số tháng thuê</th>
            <th>Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allOrderDetail as $eachOrderDetail)
            <tr>
                <td>{{ $eachOrderDetail->id_oder_detail }}</td>
                <td>{{ $eachOrderDetail->item_order }}</td>
                <td>{{ $eachOrderDetail->id_oder }}</td>
                <td>{{ $eachOrderDetail->id_product }}</td>
                <td>{{ $eachOrderDetail->quantity }}</td>
                <td>{{ $eachOrderDetail->discount }}</td>
                <td>{{ $eachOrderDetail->months }}</td>
                <td><a href="{{URL::to('/edit-order-detail/'.$eachOrderDetail->id_oder_detail)}}">Sửa mặt hàng</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
