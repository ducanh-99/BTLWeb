
<header class="panel-heading">
    Thêm sản phẩm
</header>
<?php   //notification, message,...
$message = Session::get('message');
if ($message) {
    echo '<span class="text-alert">' . $message . '</span>';
    Session::put('message', null);
}
?>
<form action="{{URL::to('/save-product')}}" method="GET">
    {{ csrf_field() }}

    <div class="form-group">
        <label>ID của branch mà chứa product</label>
        <input type="text" name="id_category_branch" class="form-control" id="id_category_branch"
               placeholder="ID của branch">
    </div>

    <div class="form-group">
        <label>Tên product</label>
        <input type="text" name="product_name" class="form-control" id="product_name"
               placeholder="Tên product">
    </div>

    <div class="form-group">
        <label>Mô tả product</label>
        <textarea style="resize: none" rows="8" class="form-control" name="product_descr"
                  id="product_descr" placeholder="Mô tả product"></textarea>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="product_image" class="form-control" id="product_image">
    </div>

    <div class="form-group">
        <label>Số lượng</label>
        <input type="text" name="product_amount" class="form-control" id="product_amount"
               placeholder="Số lượng">
    </div>

    <div class="form-group">
        <label>Giá: </label>
        <input type="text" name="product_price" class="form-control" id="product_price"
               placeholder="Giá: ">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="product_status" class="form-control input-sm m-bot15">
            <option value="0">Còn hàng</option>
            <option value="1">Ngừng kinh doanh</option>
        </select>
    </div>

    <button type="submit" name="add_product" class="btn btn-info">Thêm product</button>
</form>
