@extends('welcome')
@section('noteDetail')
    <form action="{{URL::to('/pay')}}">
        <div class="table-responsive">

            <div>
                Tỉnh thành:
                <input required name="shipping_province" id="shipping_province" type="text" placeholder="Tỉnh thành">
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
                        <td><a href="{{URL::to('/detail/'.$eachContentItem->id_product) }}"><img
                                    src="{{ URL::to('/') }}/public/image/{{$categoryMainOnly->name}}/{{$categoryBranchOnly->name}}/{{$produc->image}}"
                                    class="img-fluid"></a></td>
                        <td>{{$eachContentItem->name}}</td>
                        <td>{{$eachContentItem->qty}}</td>
                        <td>{{'$'.number_format($eachContentItem->price)}}</td>
                        <td></td>
                        <td>{{'$'.number_format($eachContentItem->price * $eachContentItem->qty)}}</td>
                        <td><input required type="number" min="1" name="months[{{$i}}]" id="months[{{$i}}]"
                                   placeholder="Số tháng"></td>
                        <td>
                            <select id="partner_delivery[{{$i}}]" name="partner_delivery[{{$i}}]" style="float: left;">
                                <?php
                                $delivery = DB::table('partner_delivery')->get();
                                ?>
                                @foreach($delivery as $eachOfDelivery)
                                    <option>
                                        {{$eachOfDelivery->id_partner_delivery}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select id="shipping_method[{{$i}}]" name="shipping_method[{{$i}}]" style="float: left;">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
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
@endsection
