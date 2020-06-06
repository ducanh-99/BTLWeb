@extends('welcome')
@section('order')
<div>
    Các oder_detail đã hết hạn của {{$allExpiredOrderDetail[0]->id_customer}}
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th>id_oder_detail</th>
                <th>STT</th>
                <th>id_oder</th>
                <th>product</th>
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
            @foreach($allExpiredOrderDetail as $eachExpiredUserOrderDetail)
            <tr>
                <td>{{ $eachExpiredUserOrderDetail->id_oder_detail }}</td>
                <td>{{ $eachExpiredUserOrderDetail->item_order }}</td>
                <td>{{ $eachExpiredUserOrderDetail->id_oder }}</td>
                <td>
                    <?php
                    $tensp = DB::table('product')->where('id_product',$eachExpiredUserOrderDetail->id_product )->get()->first();
                    ?>
                    {{ $tensp->name }}</td>
                <td>{{ $eachExpiredUserOrderDetail->quantity }}</td>
                <td>{{ $eachExpiredUserOrderDetail->discount }}</td>
                <td>{{ $eachExpiredUserOrderDetail->months }}</td>
                <?php
                $delivery =  DB::table('partner_delivery')->where('id_partner_delivery', $eachExpiredUserOrderDetail->id_partner_delivery)->get()->first();
                ?>
                <td>{{$delivery ->name }}</td>
                <td>{{ $eachExpiredUserOrderDetail->deposit }}</td>
                <td>{{ $eachExpiredUserOrderDetail->returned_date }}</td>
                <td><a href="{{URL::to('/user-return-product/'.$eachExpiredUserOrderDetail->id_oder_detail)}}">Đăng ký trả đồ</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
