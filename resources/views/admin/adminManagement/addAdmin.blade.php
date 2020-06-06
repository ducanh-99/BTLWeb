@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add admin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{URL::to('/save-admin')}}" method="GET">

                            <div class="form-group">
                                <label>Name Admin</label>
                                <input type="text" name="admin_name" class="form-control" id="admin_name"
                                       placeholder="Tên admin">
                            </div>

                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" name="admin_avatar" class="form-control" id="admin_avatar">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="admin_email" class="form-control" id="admin_email"
                                       placeholder="Email của admin">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="admin_password" class="form-control" id="admin_password"
                                       placeholder="Password của admin">
                            </div>

                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="text" name="admin_phone_number" class="form-control"
                                       id="admin_phone_number"
                                       placeholder="Phone Number of Admin">
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="admin_address" class="form-control" id="admin_address"
                                       placeholder="Address admin">
                            </div>

                            <div class="form-group">
                                <label>Credit</label>
                                <input type="text" name="admin_credit" class="form-control" id="admin_credit"
                                       placeholder="Credit admin">
                            </div>

                            <div class="form-group">
                                <label>Job</label>
                                <input type="text" name="admin_job" class="form-control" id="admin_job"
                                       >
                            </div>

                            <button type="submit" name="add_admin" class="btn btn-info">Add admin</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
