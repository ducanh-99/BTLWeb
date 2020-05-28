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
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

