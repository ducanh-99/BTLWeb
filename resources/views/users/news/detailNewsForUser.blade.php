<div>
    {{ $detailNews->id_news }}
</div>
<div class="table-responsive">
                <h1 style="color: red">{{ $detailNews->title }}</h1>
    <h6>Ngày cập nhật: {{ $detailNews->publish_date }}  Tác giả: {{ $detailNews->name }}</h6>
                <h2 style="color: #0c5460">{{ $detailNews->context }}</h2>

</div>

