<div>
    Liệt kê Branch sản phẩm
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
            <th>Id_category_branch</th>
            <th>Id_category_main</th>
            <th>name</th>
            <th>descriptionf</th>
            <th>image</th>
            <th>status</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allCategoryBranch as $eachCategoryBranch)
            <tr>
                <td>{{ $eachCategoryBranch->id_category_branch }}</td>
                <td>{{ $eachCategoryBranch->id_category_main }}</td>
                <td>{{ $eachCategoryBranch->name }}</td>
                <td>{{ $eachCategoryBranch->descriptionf }}</td>
                <td>{{ $eachCategoryBranch->image }}</td>
                <td>{{ $eachCategoryBranch->status }}
                    <?php
                    if($eachCategoryBranch->status == 1){
                    ?>
                    <a href="{{URL::to('/unactive-branch-category/'.$eachCategoryBranch->id_category_branch)}}">Deactive</a>
                    <?php
                    }else{ //if ($eachCategoryBranch->branch_status==0)
                    ?>
                    <a href="{{URL::to('/active-branch-category/'.$eachCategoryBranch->id_category_branch)}}">Active</a>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <a href="{{URL::to('/edit-branch-category/'.$eachCategoryBranch->id_category_branch)}}">Sửa thông tin branch</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
