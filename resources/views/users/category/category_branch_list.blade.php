@extends('welcome')

@section('category_branch')
<div id="content">
  <div class="container">
    <section class="bar">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>{{$descriptionMain->name}}</h2>
          </div>
          <p class="lead">{{$descriptionMain->description}}</p>
        </div>
      </div>
      <div class="row portfolio text-center">
        @foreach($branchSearch as $branchSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}
        <!-- <div>
          <img src="{{ URL::to('/') }}/public/image/{{$branchSearchValue->image}}" alt="">
        </div>
        <h3>{{$branchSearchValue->image}}</h3> -->
        <div class="col-md-4">
          <div class="box-image">
            <div class="image"><img src="{{ URL::to('/') }}/public/image/{{$branchSearchValue->image}}" alt="" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center">
                <div class="content">
                  <div class="name">
                    <h3><a href="portfolio-detail.html" class="color-white">{{$branchSearchValue->name}}</a></h3>
                  </div>
                  <div class="text">
                    <p class="buttons"><a href="{{URL::to('/product-result/'.$branchSearchValue->id_category_branch) }}" class="btn btn-template-outlined-white">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </div>
</div>
@endsection