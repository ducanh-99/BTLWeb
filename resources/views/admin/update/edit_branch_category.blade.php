
<header class="panel-heading">
    Sửa branch sản phẩm
</header>
<form action="{{URL::to('/submit-edit-branch')}}" method="GET">
    <input type="hidden" name="id_category_branch" value="{{$edit_branch_category->id_category_branch}}">
    <div class="form-group">
        <label>ID category main</label>
        <input type="text" name="id_category_main" class="form-control" id="id_category_main"
               value="{{$edit_branch_category->id_category_main}}">
    </div>

    <div class="form-group">
        <label>Tên branch</label>
        <input type="text" name="branch_name" class="form-control" id="branch_name"
               value="{{$edit_branch_category->name}}">
    </div>

    <div class="form-group">
        <label>Mô tả branch</label>
        <textarea  rows="8" class="form-control" name="branch_descr"
                  id="branch_descr">{{$edit_branch_category->descriptionf}}</textarea>
    </div>

    <div class="form-group">
        <label>Logo</label>
        <input type="file" name="branch_logo" class="form-control" id="branch_logo" value="{{$edit_branch_category->image}}">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="branch_status" class="form-control input-sm m-bot15" >
            <option value="0">Ngừng kinh doanh</option>
            <option value="1">Còn hàng</option>
        </select>
    </div>

    <button type="submit" name="edit_submit" class="btn btn-info">Xác nhận sửa branch</button>
</form>
