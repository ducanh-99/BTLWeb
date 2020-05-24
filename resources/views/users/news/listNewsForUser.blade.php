<div>
    Trang tin tức thuê đồ online
</div>
<div class="table-responsive">

        @foreach($listNews as $eachOfListNews)
            <div>
                <a href="{{URL::to('/detail-news-for-user/'.$eachOfListNews->id_news) }}">
                    <h2 style="color:red;">{{ $eachOfListNews->title }}</h2>
                </a>
                <h4 style="color: #0b2e13">{{ $eachOfListNews->context }}</h4>
            </div>
            <br>
        @endforeach

</div>
