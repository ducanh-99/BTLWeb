<div>
    Liệt kê Product
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
            <th>Id_Product_</th>
            <th>Id_category_branch</th>
            <th>name</th>
            <th>description</th>
            <th>image</th>
            <th>amount</th>
            <th>price</th>
            <th>iscctive</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allProduct as $eachProduct)
            <tr>
                <td>{{ $eachProduct->id_product }}</td>
                <td>{{ $eachProduct->id_category_branch }}</td>
                <td>{{ $eachProduct->name }}</td>
                <td>{{ $eachProduct->description }}</td>
                <td>{{ $eachProduct->image }}</td>
                <td>{{ $eachProduct->amount }}</td>
                <td>{{ $eachProduct->price }}</td>
                <td>
                    <?php
                    if($eachProduct->isactive == 1){
                    ?>
                    <a href="{{URL::to('/unactive-product/'.$eachProduct->id_product)}}">Deactive</a>
                    <?php
                    }else{ //if ($eachProduct->_status==0)
                    ?>
                    <a href="{{URL::to('/active-product/'.$eachProduct->id_product)}}">Active</a>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <a href="{{URL::to('/edit-product/'.$eachProduct->id_product)}}">Sửa Thông tin product</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
