@extends('welcome')
@section('order')
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
                <h1 class="h2">Oder</h1>
            </div>
            <div class="col-md-5">
                <ul class="breadcrumb d-flex justify-content-end">
                    <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
                    <li class="breadcrumb-item"> Order </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <br/>
    <div class="h2">Return Item</div>
    <div>
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <!-- <th>id_oder_detail</th> -->
                    <th>Index</th>
                    <!-- <th>id_oder</th> -->
                    <th>product</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Number of month rent</th>
                    <th>Partner delivery</th>
                    <th>deposit</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td>{{ $chiTiet->id_oder_detail }}</td> -->
                    <td>{{ $chiTiet->item_order }}</td>
                    <!-- <td>{{ $chiTiet->id_oder }}</td> -->
                    <td>
                        <?php
                        $tensp = DB::table('product')->where('id_product',$chiTiet->id_product )->get()->first();
                        ?>
                        {{ $tensp->name }}</td>
                    <td>{{ $chiTiet->quantity }}</td>
                    <td>{{ $chiTiet->discount }}</td>
                    <td>{{ $chiTiet->months }}</td>
                    <?php
                    $delivery =  DB::table('partner_delivery')->where('id_partner_delivery', $chiTiet->id_partner_delivery)->get()->first();
                    ?>
                    <td>{{$delivery ->name }}</td>
                    <td>{{ $chiTiet->deposit }}</td>
                    <td>{{ $chiTiet->returned_date }}</td>
                </tr>
            </tbody>
        </table>
        <p >{{$msg}}</p>
        @if(!stripos($msg,"chúng tôi không nhận sản phẩm đó nữa"))
            <p style="color: red">{{$returnFee}}</p>
        <form action="{{URL::to('/user-submit-return-product')}}" method="GET">
            <button type="submit" value="Submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Confirm</button>
            <input type="hidden" name="chiTietID" value="{{$chiTiet->id_oder_detail}}">
            <input type="hidden" name="tongQuatID" value="{{$tongQuat->id_oder}}">
            <input type="hidden" name="goodsID" value="{{$goods->id_product}}">
        </form>
        <br/>
        @endif
    </div>
</div>
@endsection
