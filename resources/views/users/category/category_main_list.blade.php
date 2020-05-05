<table>
    <thead>
    <tr>
        <th>Id_category_main</th>
        <th>name</th>
        <th>description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($mainSearch as $key => $mainSearchValue) {{--$product chứa tất cả các bản ghi đã truy vấn, $key chứa chỉ số bản ghi, $productValue chứa từng bản ghi một--}}

    <tr>
        <td>{{ $mainSearchValue->id_category_main }}</td>
        <td><a href="{{URL::to('/branch-result/'.$mainSearchValue->id_category_main) }}">{{ $mainSearchValue->name }}</a></td>
        <td>{{ $mainSearchValue->description }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

