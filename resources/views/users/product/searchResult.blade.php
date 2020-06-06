
<table>
    <thead>
    <tr>
        <th>Product_</th>
        <th>category_branch</th>
        <th>category_main</th>
        <th>name</th>
        <th>description</th>
        <th>image</th>
        <th>amount</th>
        <th>price</th>
        <th>iscctive</th>
    </tr>
    </thead>
    <tbody>
    @foreach($product as $productValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}

    <tr>
        <td>
            <?php
            $prod = DB::table('product')->where('id_product',$productValue->id_product)->get()->first();
            ?>
            {{$prod->name}}
        </td>
        <td>
            <?php
            $bra = DB::table('category_branch')->where('id_category_branch',$prod->id_category_branch)->get()->first();
            ?>
            {{$bra->name}}
        </td>
        <td><?php
            $cat = DB::table('category_main')->where('id_category_main',$bra->id_category_main)->get()->first();
            ?>
            {{$cat->name}}
        </td>

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
