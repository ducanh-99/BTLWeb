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
<h1> Thank you for believing in using our services. Have a nice day. </h1>
@endsection
