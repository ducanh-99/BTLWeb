@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All News</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Form add new News -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".bs-example-modal-lg">Add News
                        </button>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg-12" role="document">
                                <div class="modal-content">
                                    <div class="modal-body ">
                                        <section>
                                            <div>
                                                <div class="row">
                                                    <!-- left column -->

                                                    <div class="col-md-12">
                                                        <!-- general form elements -->
                                                        <div class="card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Add News</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <!-- form start -->
                                                            <form action="{{URL::to('/save-news')}}" method="GET">
                                                                {{ csrf_field() }}
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label>Tiêu đề bài viết</label>
                                                                        <input type="text" name="title"
                                                                               class="form-control" id="title"
                                                                               placeholder="tiêu đề của news">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Nội dung </label>
                                                                        <textarea type="text" name="context"
                                                                                  class="form-control" id="context"
                                                                                  placeholder="Nội dung bài viết"></textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>product</label>
{{--                                                                        <input type="text" name="id_product"--}}
{{--                                                                               class="form-control"--}}
{{--                                                                               placeholder="id product" id="id_product">--}}
                                                                        <?php
                                                                        $sp = DB::table('product')->get();
                                                                        ?>
                                                                        <select  class="form-control input-sm m-bot15" name="id_product" id="id_product" >
                                                                            @foreach($sp as $indexsp)
                                                                                <option
                                                                                    value="{{$indexsp->id_product}}">{{$indexsp->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Hiển thị</label>
                                                                        <select name="status"
                                                                                class="form-control input-sm m-bot15">
                                                                            <option value="0">Ẩn</option>
                                                                            <option value="1">Hiển thị</option>
                                                                        </select>
                                                                    </div>
                                                                    <!-- /.card-body -->

                                                                    <div class="card-footer">
                                                                        <button type="submit" name="add_branch"
                                                                                class="btn btn-primary">Add News
                                                                        </button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end form -->
                        <br></br>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id_news</th>
                                <th>title</th>
                                <th>context</th>
                                <th>publish_date</th>
                                <th>product</th>
                                <th>author</th>
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
                                    <td>
                                        <?php
                                        $sp = DB::table('product')->where('id_product',$eachOfAllNews->id_product)->get()->first();
                                        ?>
                                        {{$sp->name}}
                                    </td>
                                    <td>
                                        <?php
                                        $author = DB::table('admininfo')->where('id_admin',$eachOfAllNews->id_admin)->get()->first();
                                        ?>
                                        {{$author->name}}
                                    </td>
                                    <td>{{ $eachOfAllNews->status }}
                                        <?php
                                        if($eachOfAllNews->status == 1){
                                        ?>
                                        <a href="{{URL::to('/unactive-news/'.$eachOfAllNews->id_news)}}">Deactive
                                            news</a>
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
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
