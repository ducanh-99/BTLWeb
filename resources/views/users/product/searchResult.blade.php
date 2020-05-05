
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
    @foreach($product as $key => $productValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}

    <tr>
        <td>{{ $productValue->id_product }}</td>
        <td>{{$productValue->id_category_branch}}</td>
        <td><a href="{{URL::to('/detail/'.$productValue->id_product) }}">{{ $productValue->name }}</a></td>
        <td>{{ $productValue->description }}</td>
        <td>{{ $productValue->image }}</td>
        <td>{{ $productValue->amount }}</td>
        <td>{{ $productValue->price }}</td>
        <td>{{$productValue->isactive}}</td>
    </tr>
    @endforeach
    </tbody>
</table>

<?php
//foreach ($array as $key => $value){
//    // Các dòng lệnh
//}
?>
