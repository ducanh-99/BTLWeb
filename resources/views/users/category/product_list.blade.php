@foreach($productSearch as $productSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <a href="{{URL::to('/detail/'.$productSearchValue->id_product)}}">  {{--Dẫn đến trang liệt kê tất cả các branch tương ưng với id_category_main này--}}
            <div class="single-products">
                <div class="productinfo text-center">
                    <h2>Name of Product: {{($productSearchValue->name)}}</h2>
                    <p>ID of Product: {{($productSearchValue->id_product)}}</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endforeach
