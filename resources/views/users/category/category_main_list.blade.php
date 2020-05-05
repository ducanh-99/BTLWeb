@extends('welcome')
@section('category_main')  


<div id="content">
    <div class="container">
      <section class="bar">
@foreach($mainSearch as $mainSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}

        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <a href="{{URL::to('/branch-result/'.$mainSearchValue->id_category_main)}}">
                    <h2>{{$mainSearchValue->name}}</h2>
                </div>
                <div>
                    <h5>{{$mainSearchValue->description}}</h5>
                </div>
            </div>
        </div>


<!-- <div class="col-sm-4">
    <div class="product-image-wrapper">
        <a href="{{URL::to('/branch-result/'.$mainSearchValue->id_category_main)}}">  {{--Dẫn đến trang liệt kê tất cả các branch tương ưng với id_category_main này--}}
            <div class="single-products">
                <div class="productinfo text-center">
                    <h2>Name of Main: {{($mainSearchValue->name)}}</h2>
                    <p>ID of Main: {{($mainSearchValue->id_category_main)}}</p>
                </div>
            </div>
        </a>
    </div>
</div> -->
@endforeach
        </section>
    </div>
</div>
@endsection