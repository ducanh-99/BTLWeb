<table>
    <thead>
    <tr>
        <th>Id_category_branch</th>
        <th>Id_category_main</th>
        <th>name</th>
        <th>descriptionf</th>
        <th>image</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($branchSearch as $key => $branchSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}

    <tr>
        <td>{{ $branchSearchValue->id_category_branch }}</td>
        <td>{{ $branchSearchValue->id_category_main }}</td>
        <td><a href="{{URL::to('/product-result/'.$branchSearchValue->id_category_branch) }}">{{ $branchSearchValue->name }}</a></td>
        <td>{{ $branchSearchValue->descriptionf }}</td>
        <td>{{ $branchSearchValue->image }}</td>
        <td>{{$branchSearchValue->status}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
