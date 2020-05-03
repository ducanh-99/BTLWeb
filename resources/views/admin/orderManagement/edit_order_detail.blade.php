
<header class="panel-heading">
    Sửa order detail
</header>
<form action="{{URL::to('/submit-edit-order-detail')}}" method="GET">
    <input type="hidden" name="id_oder_detail" value="{{$oder_detail->id_oder_detail}}">
    <div class="form-group">
        <label>STT</label>
        <input type="text" name="item_order" class="form-control" id="item_order"
               value="{{$oder_detail->item_order}}">
    </div>

    <div class="form-group">
        <label>Id_order </label>
        <input type="text" name="id_oder" class="form-control" id="id_oder"
               value="{{$oder_detail->id_oder}}">
    </div>

    <div class="form-group">
        <label>Id_product</label>
        <input class="form-control" name="id_product" id="id_product" value="{{$oder_detail->id_product}}">
    </div>

    <div class="form-group">
        <label>Số lượng</label>
        <input type="text" name="quantity" class="form-control" id="quantity" value="{{$oder_detail->quantity}}">
    </div>

    <div class="form-group">
        <label>Số tháng thuê</label>
        <input type="text" name="months" class="form-control" id="months" value="{{$oder_detail->months}}">
    </div>

    <button type="submit" name="edit_submit" class="btn btn-info">Xác nhận sửa </button>
</form>
