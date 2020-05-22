<div>
    Lịch sử Order của {{$allUserOrder[0]->id_customer}}
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>id_oder</th>
            <th>id_customer</th>
            <th>Ngày đặt hàng</th>
            <th>Phê duyệt</th>
            <th>Ghi chú</th>
            <th>Xem chi tiết</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allUserOrder as $eachUserOrder)
            <tr>
                <td>{{ $eachUserOrder->id_oder }}</td>
                <td>{{ $eachUserOrder->id_customer }}</td>
                <td>{{ $eachUserOrder->date }}</td>
                <td>{{ $eachUserOrder->isapproved }}
                    <?php
                    if($eachUserOrder->isapproved == 0){    //đơn hàng nào chưa được duyệt thì user có thể hủy
                    ?>

                    <a href="{{URL::to('/user-cancel-order/'.$eachUserOrder->id_oder)}}">Hủy</a>

                <?php
                    }
                    ?>
                </td>
                <td>{{ $eachUserOrder->note }}</td>
                <td><a href="{{URL::to('/user-view-order-detail/'.$eachUserOrder->id_oder)}}">Xem chi tiết</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
