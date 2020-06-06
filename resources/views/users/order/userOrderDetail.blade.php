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

<div class="container-sm">
    <div>
        <h1 style="text-align:center;">Detailed order history {{$allUserOrderDetail[0]->id_oder}}</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
{{--                    <th>id_oder_detail</th>--}}
                    <th>STT</th>
                    <!-- <th>id_oder</th> -->
                    <th>product</th>
                    <th>Amount</th>
                    <th>Discount</th>
                    <th>Number of months rented</th>
                    <th>Shipping partner</th>
                    <th>deposit</th>
                    <th>Return date</th>
                    <th>Returns</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allUserOrderDetail as $eachUserOrderDetail)
                <tr>
{{--                    <td>{{ $eachUserOrderDetail->id_oder_detail }}</td>--}}
                    <td>{{ $eachUserOrderDetail->item_order }}</td>
                    <!-- <td>{{ $eachUserOrderDetail->id_oder }}</td> -->
                    <td>
                        <?php
                        $tensp = DB::table('product')->where('id_product',$eachUserOrderDetail->id_product )->get()->first();
                        ?>
                        {{ $tensp->name }}</td>
                    <td>{{ $eachUserOrderDetail->quantity }}</td>
                    <td>{{ $eachUserOrderDetail->discount }}</td>
                    <td>{{ $eachUserOrderDetail->months }}</td>
                    <?php
                    $delivery =  DB::table('partner_delivery')->where('id_partner_delivery', $eachUserOrderDetail->id_partner_delivery)->get()->first();
                    ?>
                    <td>{{$delivery ->name }}</td>
                    <td>{{ $eachUserOrderDetail->deposit }}</td>
                    <td>{{ $eachUserOrderDetail->returned_date }}</td>
                    <td><a href="{{URL::to('/user-return-product/'.$eachUserOrderDetail->id_oder_detail)}}">Register to return items</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
