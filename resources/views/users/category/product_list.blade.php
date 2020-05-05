<table>
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
</table>
