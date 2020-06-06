<!-- <div>
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
        @foreach($allCategoryBranch ?? '' as $eachCategoryBranch)
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
</div> -->


@extends('admin.welcomeAdmin')
@section('all_branch_category')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Branch Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Form add new product -->
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bs-example-modal-lg">Add new branch category</button>
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
                                                            <h3 class="card-title">New branch Category</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <!-- form start -->
                                                        <form action="{{URL::to('/save-branch-category')}}"
                                                            method="GET">
                                                            {{ csrf_field() }}
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label for="Id_category">ID category</label>
                                                                    <input type="text" class="form-control"
                                                                        name="id_category_main" id="id_category_main"
                                                                        placeholder="ID Catergory Main">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Branch Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="branch_name" id="branch_name"
                                                                        placeholder="Branch name">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Description branch</label>
                                                                    <textarea style="resize: none" rows="8"
                                                                        class="form-control" name="branch_descr"
                                                                        id="branch_descr"
                                                                        placeholder="Description branch"></textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Logo</label>
                                                                    <input type="file" name="branch_logo"
                                                                        class="form-control" id="branch_logo">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="branch_status"
                                                                        class="form-control input-sm m-bot15">
                                                                        <option value="0">Active</option>
                                                                        <option value="1">Deactive</option>
                                                                    </select>
                                                                </div>
                                                                <!-- /.card-body -->

                                                                <div class="card-footer">
                                                                    <button type="submit" name="add_branch"
                                                                        class="btn btn-primary">Add New Branch</button>
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
                    <!-- alert Edit -->
                    @if(isset($checkedit))
                    <br />
                    <div class="row">
                        <div class="col-12">
                            @if($checkedit == true)
                            <div class="alert alert-success alert-dismissible"> 
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong id="alert-header">{{$alert}}</strong>
                            </div> 
                            @endif
                        </div>
                    </div>
                    @endif
                    <!-- end alertEdit -->

                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 18%">ID Category Branch</th>
                                <th style="width: 20%">Name Category Main</th>
                                <th>Name</th>
                                <!-- <th>Description</th> -->
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allCategoryBranch ?? '' as $eachCategoryBranch)
                            <?php
                                    $categoryMainOnly = DB::table('category_main')->where('id_category_main',$eachCategoryBranch->id_category_main)->get()->first();    //chứa 1 bản ghi trong bảng main
                                    ?>
                            <tr>
                                <td class="text-center">{{ $eachCategoryBranch->id_category_branch }}</td>
                                <td class="text-center">{{$categoryMainOnly->name}}</td>
                                <td>{{ $eachCategoryBranch->name }}</td>
                                <!-- <td>{{ $eachCategoryBranch->descriptionf }}</td> -->
                                <td><img src="{{ URL::to('/') }}/public/image/{{$eachCategoryBranch->image}}" alt=""
                                        class="img-fluid"></td>
                                <td>
                                    <?php
                                            if($eachCategoryBranch->status == 1){
                                            ?>
                                    <a
                                        href="{{URL::to('/unactive-branch-category/'.$eachCategoryBranch->id_category_branch)}}">Deactive</a>
                                    <?php
                                            }else{ //if ($eachCategoryBranch->branch_status==0)
                                            ?>
                                    <a
                                        href="{{URL::to('/active-branch-category/'.$eachCategoryBranch->id_category_branch)}}">Active</a>
                                    <?php
                                            }
                                            ?>
                                </td>
                                <td>
                                    <a
                                        href="{{URL::to('/edit-branch-category/'.$eachCategoryBranch->id_category_branch)}}">Edit</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div>
                        <br />
                        <div style="float: right">
                            {!! $allCategoryBranch ?? ''->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>
@endsection