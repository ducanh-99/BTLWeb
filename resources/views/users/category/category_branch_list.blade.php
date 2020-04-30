@foreach($branchSearch as $branchSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <a href="{{URL::to('/product-result/'.$branchSearchValue->id_category_branch)}}">  {{--Dẫn đến trang liệt kê tất cả các branch tương ưng với id_category_main này--}}
            <div class="single-products">
                <div class="productinfo text-center">
                    <h2>Name of Branch: {{($branchSearchValue->name)}}</h2>
                    <p>ID of Branch: {{($branchSearchValue->id_category_branch)}}</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endforeach
