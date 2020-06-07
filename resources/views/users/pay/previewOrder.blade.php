@extends('welcome')
@section('noteDetail')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="breadcrumbs">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                    <li class="breadcrumb-item">Preview</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <form action="{{URL::to('/pay')}}">
        <div class="table-responsive">

            <div>
                Tỉnh thành:
                <?php
                $prov = DB::table('province')->get();
                ?>
                <select class="form-control input-sm m-bot15" name="shipping_province" id="shipping_province">
                    @foreach($prov as $indexprov)
                    <option value="{{$indexprov->id_province}}">{{$indexprov->name}}
                    </option>
                    @endforeach
                </select>

                {{-- <input required name="shipping_province" id="shipping_province" type="text" placeholder="Tỉnh thành">--}}
            </div>
            <table class="table">
                <thead>

                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Discount</th>
                    <th>Temp Total</th>
                    <th>Months</th>
                    <th>Partner Delivery</th>
                    <th>Shipping Method</th>
                    </tr>
                </thead>
                <?php $content = Cart::content();
                $i = 0;
                ?>
                @foreach($content as $eachContentItem)

                <tr>
                    <?php
                    $produc = DB::table('product')->where('id_product', $eachContentItem->id)->get()->first();
                    $categoryBranchOnly = DB::table('category_branch')->where('id_category_branch', $produc->id_category_branch)->get()->first();   //chứa 1 bản ghi trong bảng branch
                    $categoryMainOnly = DB::table('category_main')->where('id_category_main', $categoryBranchOnly->id_category_main)->get()->first();
                    ?>
                    <td><a href="{{URL::to('/detail/'.$eachContentItem->id_product) }}"><img src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$produc->image}}" class="img-fluid"></a></td>
                    <td>{{$eachContentItem->name}}</td>
                    <td>{{$eachContentItem->qty}}</td>
                    <td>{{'$'.number_format($eachContentItem->price)}}</td>
                    <td></td>
                    <td>{{'$'.number_format($eachContentItem->price * $eachContentItem->qty)}}</td>
                    <td>
                        {{-- <input required type="number" min="1" name="months[{{$i}}]" id="months[{{$i}}]"--}}
                        {{-- placeholder="Số tháng">--}}
                        <select class="form-control form-control-sm" name="months[{{$i}}]" id="months[{{$i}}]">
                            @for ($j = 1; $j <= 36; $j++) <option>{{$j}}</option>
                                @endfor
                        </select>
                    </td>
                    <td>
                        <select class="form-control form-control-sm" id="partner_delivery[{{$i}}]" name="partner_delivery[{{$i}}]" style="float: left;">
                            <?php
                            $delivery = DB::table('partner_delivery')->get();
                            ?>
                            @foreach($delivery as $eachOfDelivery)
                            <option value="{{$eachOfDelivery->id_partner_delivery}}">
                                {{$eachOfDelivery->name}}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control form-control-sm" id="shipping_method[{{$i}}]" name="shipping_method[{{$i}}]" style="float: left;">
                            <option value="0">Chỉ giao hàng đến</option>
                            <option value="1">Yêu cầu shipper đến lấy hàng đi khi thuê xong</option>
                            <option value="2">Cả 2 yêu cầu trên</option>
                        </select>
                    </td>
                </tr>
                <?php
                $i++;
                ?>
                @endforeach
            </table>

        </div>
        @if(count($content) > 0)
        <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
        @endif
    </form>
</div>
@endsection