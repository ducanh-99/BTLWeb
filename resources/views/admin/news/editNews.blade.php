@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit News</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{URL::to('/submit-edit-news')}}" method="GET">
                            <input type="hidden" name="id_news" value="{{$edit_news->id_news}}">
                            <div class="form-group">
                                <label>tiêu đề bài viết</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="{{$edit_news->title}}">
                            </div>

                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea onresize="true" rows="8" class="form-control" name="context"
                                          id="context">{{$edit_news->context}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>id_product</label>
                                <input type="text" name="id_product" class="form-control" id="id_product"
                                       value="{{$edit_news->id_product}}">
                            </div>


                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control input-sm m-bot15">
                                    <option value="0">Unactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>

                            <button type="submit" name="edit_submit" class="btn btn-info">Xác nhận sửa news</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
