<header class="panel-heading">
    Sửa product sản phẩm
</header>
<form action="{{URL::to('/submit-edit-product')}}" method="GET">
    <input type="hidden" name="id_product" value="{{$edit_product->id_product}}">
    <div class="form-group">
        <label>ID category branch</label>
        <input type="text" name="id_category_branch" class="form-control" id="id_main"
               value="{{$edit_product->id_category_branch}}">
    </div>

    <div class="form-group">
        <label>Tên product</label>
        <input type="text" name="product_name" class="form-control" id="product_name"
               value="{{$edit_product->name}}">
    </div>

    <div class="form-group">
        <label>Mô tả product</label>
        <textarea style="resize: none" rows="8" class="form-control" name="product_descr"
                  id="product_descr" >{{$edit_product->description}}</textarea>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="product_image" class="form-control" id="product_logo"
               value="{{$edit_product->image}}">
    </div>

    <div class="form-group">
        <label>Số lượng</label>
        <input type="text" name="product_amount" class="form-control" id="product_amount"
               value="{{$edit_product->amount}}">
    </div>

    <div class="form-group">
        <label>Giá cả</label>
        <input type="text" name="product_price" class="form-control" id="product_price"
               value="{{$edit_product->price}}">
    </div>

    <div class="form-group">
        <label>Trạng tháo</label>
        <select name="product_isActive" class="form-control input-sm m-bot15">
            <option value="0">Ngừng kinh doanh</option>
            <option value="1">Còn hàng</option>
        </select>
    </div>

    <button type="submit" name="edit_submit" class="btn btn-info">Xác nhận sửa product</button>
</form>
