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
    <div>
        Order history
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
                <tr>
                    <th>id_oder</th>
                    <th>id_customer</th>
                    <th>Order date</th>
                    <th>Approved</th>
                    <th>Note</th>
                    <th>Province</th>
                    <th>Total</th>
                    <th>View detail</th>
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
                        if ($eachUserOrder->isapproved == 0) {    //đơn hàng nào chưa được duyệt thì user có thể hủy
                        ?>

                            <a href="{{URL::to('/user-cancel-order/'.$eachUserOrder->id_oder)}}">Hủy</a>

                        <?php
                        }
                        ?>
                    </td>
                    <td>{{ $eachUserOrder->note }}</td>

                    <?php
                    $provin = DB::table('province')->where('id_province', $eachUserOrder->id_province)->get()->first();
                    ?>
                    <td>{{ $provin->name }}</td>
                    <td>{{ $eachUserOrder->totalcost }}</td>
                    <td><a href="{{URL::to('/user-view-order-detail/'.$eachUserOrder->id_oder)}}">Xem chi tiết</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection