<div>
    Liệt kê News
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>id_news</th>
            <th>title</th>
            <th>context</th>
            <th>publish_date</th>
            <th>id_product</th>
            <th>id_admin</th>
            <th>status</th>
            <th>edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allNews as $eachOfAllNews)
            <tr>
                <td>{{ $eachOfAllNews->id_news }}</td>
                <td>{{ $eachOfAllNews->title }}</td>
                <td>{{ $eachOfAllNews->context }}</td>
                <td>{{ $eachOfAllNews->publish_date }}</td>
                <td>{{ $eachOfAllNews->id_product }}</td>
                <td>{{ $eachOfAllNews->id_admin }}</td>
                <td>{{ $eachOfAllNews->status }}
                    <?php
                    if($eachOfAllNews->status == 1){
                    ?>
                    <a href="{{URL::to('/unactive-news/'.$eachOfAllNews->id_news)}}">Deactive news</a>
                    <?php
                    }else{ //if ($eachOfAllNews->status==0)
                    ?>
                    <a href="{{URL::to('/active-news/'.$eachOfAllNews->id_news)}}">Active news</a>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <a href="{{URL::to('/edit-news/'.$eachOfAllNews->id_news)}}">Edit news</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
