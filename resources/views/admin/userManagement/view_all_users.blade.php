@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View All Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id_customer</th>
                                <th>name</th>
                                <th>email</th>
                                <th>password</th>
                                <th>phone_number</th>
                                <th>address</th>
                                <th>credit</th>
                                <th>status</th>
                                <th>isProvider?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allUser as $eachUser)
                                <tr>
                                    <td>{{ $eachUser->id_customer }}</td>
                                    <td>{{ $eachUser->name }}</td>
                                    <td>{{ $eachUser->email }}</td>
                                    <td>{{ $eachUser->password }}</td>
                                    <td>{{ $eachUser->phone_number }}</td>
                                    <td>{{ $eachUser->address }}</td>
                                    <td>{{ $eachUser->credit }}</td>
                                    <td>{{ $eachUser->status }}
                                        <?php
                                        if($eachUser->status == 0){ //bị block
                                        ?>
                                        <a href="{{URL::to('/unblock-user/'.$eachUser->id_customer)}}">Unblock</a>
                                        <?php
                                        }else{ //if ($eachUser->_status==1) // active
                                        ?>
                                        <a href="{{URL::to('/block-user/'.$eachUser->id_customer)}}">Block</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>{{ $eachUser->isprovider }}
                                        <?php
                                        if($eachUser->isprovider == 0){ //chưa được phép cho thuê đồ
                                        ?>
                                        <a href="{{URL::to('/make-provider-user/'.$eachUser->id_customer)}}">Make Provider</a>
                                        <?php
                                        }else{ //if ($eachUser->isprovider==1) //được phép đăng sản phẩm cho thuê
                                        ?>
                                        <a href="{{URL::to('/unmake-provider-user/'.$eachUser->id_customer)}}">Unmake Provider</a>
                                        <?php
                                        }
                                        ?>
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
