@extends('welcome')
@section('product')
<div id="content">
  <div class="container">
    <section class="bar">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>{{$nameBranch->name}}</h2>
          </div>
          <p class="lead">{{$nameBranch->descriptionf}}</p>
        </div>
      </div>
      <div class="row portfolio text-center">
        @foreach($productSearch as $key => $productSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}
        <!-- <h2>{{ URL::to('/') }}/public/image/{{$url}}{{$productSearchValue->image}}</h2>     -->
        <div class="col-md-3">
          <div class="box-image">
            <div class="image"><img src="{{ URL::to('/') }}/public/image/{{$url}}{{$productSearchValue->image}}" alt="" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center">
                <div class="content">
                  <div class="name">
                    <h3><a href="portfolio-detail.html" class="color-white">{{$productSearchValue->name}}</a></h3>
                  </div>
                  <div class="text">
                    <p class="buttons"><a href="{{URL::to('/detail/'.$productSearchValue->id_product) }}" class="btn btn-template-outlined-white">Add to Cart</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <h5>{{$productSearchValue->description}}</h5>
          </div>
        </div>
        @endforeach
      </div>
    </section>
  </div>
</div>
<!-- <table>
    <thead>
    <tr>
        <th>Id_Product_</th>
        <th>Id_category_branch</th>
        <th>name</th>
        <th>description</th>
        <th>image</th>
        <th>amount</th>
        <th>price</th>
        <th>iscctive</th>
    </tr>
    </thead>
    <tbody>
    @foreach($productSearch as $key => $productSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productSearchValue chứa từng bản ghi một--}}

    <tr>
        <td>{{ $productSearchValue->id_product }}</td>
        <td>{{$productSearchValue->id_category_branch}}</td>
        <td><a href="{{URL::to('/detail/'.$productSearchValue->id_product) }}">{{ $productSearchValue->name }}</a></td>
        <td>{{ $productSearchValue->description }}</td>
        <td>{{ $productSearchValue->image }}</td>
        <td>{{ $productSearchValue->amount }}</td>
        <td>{{ $productSearchValue->price }}</td>
        <td>{{$productSearchValue->isactive}}</td>
    </tr>
    @endforeach
    </tbody>
</table> -->
@endsection
