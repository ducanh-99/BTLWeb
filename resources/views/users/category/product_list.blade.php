@extends('welcome', ['app' => $app])
@section('product')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">{{$nameBranch->name}}</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Home</a></li>
          <li class="breadcrumb-item"> <a href="{{URL::to('/branch-result/'.$MainOnly->id_category_main)}}">{{$MainOnly->name}}</a> </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="content">
  <div class="container">
    <section class="bar">
      <!-- Show info branch -->
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>{{$nameBranch->name}}</h2>
          </div>
          <p class="lead">{{$nameBranch->descriptionf}}</p>
        </div>
      </div>
      <!-- End show info branch -->
      <div class="row portfolio text-center">
        <!-- Show category -->
        @foreach($productSearch as $key => $productSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}
        <!-- <h2>{{ URL::to('/') }}/public/image/{{$url}}{{$productSearchValue->image}}</h2>     -->
        <div class="col-md-3">
          <div class="box-image">
            <div class="image"><img src="{{ URL::to('/') }}/public/image/{{$url}}{{$productSearchValue->image}}" alt="" class="img-fluid">
              <div class="overlay d-flex align-items-center justify-content-center">
                <div class="content">
                  <div class="name">
                    <h3><a href="{{URL::to('/detail/'.$productSearchValue->id_product) }}" class="color-white">{{$productSearchValue->name}}</a></h3>
                  </div>
                  <div class="text">
                    <p class="buttons"><a href="{{URL::to('/detail/'.$productSearchValue->id_product) }}" class="btn btn-template-outlined-white">Show Detail</a>
                    <form  action="{{URL::to('/save-cart')}}" method="GET">
                      <input type="hidden" name = "quantity" value = "1"/>
                      <input name="productid_hidden" type="hidden" value="{{$productSearchValue->id_product}}"/>
                      <p class="bottons"><button type="submit" class="btn btn-template-outlined-white"><i class="fa fa-shopping-cart"></i> Add to cart</button></p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
            <h5>{{$productSearchValue->name}}</h5>
              <h5 style="color: red">$.{{$productSearchValue->price}} /month</h5>
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
