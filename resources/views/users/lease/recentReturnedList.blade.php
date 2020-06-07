@extends('welcome')
@section('lease')
    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row d-flex align-items-center flex-wrap">
                <div class="breadcrumbs">
                    <ul class="breadcrumb d-flex justify-content-end">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item">Recent Returned</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
    //hiển thị các danh mục mà người dùng vừa mới trả lại, chưa được bên cho thuê kiểm duyệt chất lượng hàng hóa
    //thông báo về số lượng mặt hàng đã được trả lại nhưng bên cho thuê chưa nhận
    $cnt = count($recentReturnedList);
    if ($cnt > 0) {
        echo "<script type='text/javascript'>
                        var r=confirm(\"có $cnt đồ mà bạn cho thuê đã được người dùng trả lại cho bạn, vui lòng đánh giá tình trạng sản phẩm trong thời gian sớm nhất có thể để người khác tiếp tục thuê, ấn OK để xem chi tiết\");
                        if (r==true){

                        } else{
                        location.href = \"http://localhost/CNWeb/BTLWeb/lease-recent-returned-list\";
                        }
                      </script>";
        //duyệt xong
    }
    //
    ?>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View
                            All {{DB::table('customer')->where('id_customer',Session::get('id_lease'))->get()->first()->name}}
                            '
                            Recent Returned Orders List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="{{URL::to('/lease-view-order-detail')}}">
                            <button type="button" class="btn btn-primary">Leased
                            </button>
                        </a>
                        <a href="{{URL::to('/lease-recent-returned-list')}}">
                            <button type="button" class="btn btn-primary">Recent Returned
                            </button>
                        </a>
                        <a href="{{URL::to('/lease-all-product')}}">
                            <button type="button" class="btn btn-primary">Manage Product
                            </button>
                        </a>
                        <a href="{{URL::to('/lease-all-expired-order-detail')}}">
                            <button type="button" class="btn btn-primary">Expired Order
                            </button>
                        </a>
                        <form action="{{URL::to('/lease-update-outlook')}}" method="GET">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id_oder_detail</th>
                                    <th>STT</th>
                                    <th>Orderer</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Number of months rented</th>
                                    <th>Shipping partner</th>
                                    <th>Deposit</th>
                                    <th>Date return</th>
                                    <th>Ship fee</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $index = 0;
                                ?>
                                @foreach($recentReturnedList as $eachReturnedItem)
                                    <tr>
                                        <td>{{ $eachReturnedItem->id_oder_detail }}</td>
                                        <td>{{ $eachReturnedItem->item_order }}</td>
                                        <?php
                                        $Order = DB::table('oder')->where('id_oder', $eachReturnedItem->id_oder)->get()->first();
                                        $Custome = DB::table('customer')->where('id_customer', $Order->id_customer)->get()->first();
                                        ?>
                                        <td>{{ $Custome->name }}</td>
                                        <?php
                                        $sp = DB::table('product')->where('id_product', $eachReturnedItem->id_product)->get()->first();
                                        ?>
                                        <td>{{ $sp->name }}</td>
                                        <td>{{ $eachReturnedItem->quantity }}</td>
                                        <td>{{ $eachReturnedItem->discount }}</td>
                                        <td>{{ $eachReturnedItem->months }}</td>
                                        <?php
                                        $delivery = DB::table('partner_delivery')->where('id_partner_delivery', $eachReturnedItem->id_partner_delivery)->get()->first();
                                        ?>
                                        <td>{{$delivery ->name }}</td>
                                        <td>{{ $eachReturnedItem->deposit }}</td>
                                        <td>{{ $eachReturnedItem->returned_date }}</td>
                                        <td>{{ $eachReturnedItem->shipping_fee }}</td>
                                        <td>

                                            <input type="hidden" name="id_oder_detail[{{$index}}]"
                                                   value="{{$eachReturnedItem->id_oder_detail}}">
                                            <input type="hidden" name="id_product[{{$index}}]"
                                                   value="{{$sp->id_product}}">
                                            <input type="number" name="outlook[{{$index}}]" id="outlook[{{$index}}]"
                                                   value="{{$sp->outlook}}">

                                        </td>
                                    </tr>
                                    <?php
                                    $index++;
                                    ?>
                                @endforeach

                                </tbody>
                            </table>
                            <input type="hidden" name="count" id="count"
                                   value="{{count($recentReturnedList)}}}">
                            <button type="submit" name="outlookSubmit" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
