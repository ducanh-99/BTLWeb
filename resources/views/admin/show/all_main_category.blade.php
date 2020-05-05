<div>
    Liệt kê main sản phẩm
</div>
<div class="table-responsive">
    <?php
    $message = Session::get('message');
    if ($message) {
        echo '<span class="text-alert">' . $message . '</span>';
        Session::put('message', null);
    }
    ?>
    <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>id_category_main</th>
            <th>name</th>
            <th>description</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allCategoryMain as $eachCategoryMain)
            <tr>
                <td>{{ $eachCategoryMain->id_category_main }}</td>
                <td>{{ $eachCategoryMain->name }}</td>
                <td>{{ $eachCategoryMain->description }}</td>
                <td>
                    <a href="{{URL::to('/edit-main-category/'.$eachCategoryMain->id_category_main)}}">Sửa thông tin main</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
