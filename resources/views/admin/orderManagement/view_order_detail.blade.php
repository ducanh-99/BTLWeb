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
                                <th>id_oder_detail</th>
                                <th>STT</th>
                                <th>id_oder</th>
                                <th>id_product</th>
                                <th>Số lượng</th>
                                <th>Giảm giá</th>
                                <th>Số tháng thuê</th>
                                <th>Đối tác vận chuyển</th>
                                <th>Đặt Cọc</th>
                                <th>Ngày trả đồ</th>
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
                                    <?php
                                    $delivery =  DB::table('partner_delivery')->where('id_partner_delivery',$eachOrderDetail->id_partner_delivery)->get()->first();
                                    ?>
                                    <td>{{$delivery ->name }}</td>
                                    <td>{{ $eachOrderDetail->deposit }}</td>
                                    <td>{{ $eachOrderDetail->returned_date }}</td>
                                    <td><a href="{{URL::to('/edit-order-detail/'.$eachOrderDetail->id_oder_detail)}}">Sửa
                                            mặt hàng</a></td>
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
