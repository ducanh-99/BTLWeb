@extends('admin.welcomeAdmin')
@section('all_branch_category')

    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <p><a href="#users" class="scroll-to text-uppercase">Scroll to All Users</a>
                            <a href="#lease" class="scroll-to text-uppercase">Scroll to All Lease</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h3 id="users" class="card-title">View All Users</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID Customer</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>password</th> -->
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Credit</th>
                                <th>Status</th>
                                <th>isProvider?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allUser as $eachUser)
                                <tr>
                                    <td>{{ $eachUser->id_customer }}</td>
                                    <td>{{ $eachUser->name }}</td>
                                    <td>{{ $eachUser->email }}</td>
                                    <!-- <td>{{ $eachUser->password }}</td> -->
                                    <td>{{ $eachUser->phone_number }}</td>
                                    <td>{{ $eachUser->address }}</td>
                                    <td>{{ $eachUser->credit }}</td>
                                    <td>
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
                                    <td>
                                        <?php
                                        if($eachUser->isprovider == 0){ //chưa được phép cho thuê đồ
                                        ?>
                                        <a href="{{URL::to('/make-provider-user/'.$eachUser->id_customer)}}">Make
                                            </a>
                                        <?php
                                        }else{ //if ($eachUser->isprovider==1) //được phép đăng sản phẩm cho thuê
                                        ?>
                                        <a href="{{URL::to('/unmake-provider-user/'.$eachUser->id_customer)}}">Unmake
                                            r</a>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 id="lease" class="card-title">View All Lease</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <br></br>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID Customer</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!-- <th>password</th> -->
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Credit</th>
                                <th>Status</th>
                                <th>isProvider?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allLease as $eachLease)
                                <tr>
                                    <td>{{ $eachLease->id_customer }}</td>
                                    <td>{{ $eachLease->name }}</td>
                                    <td>{{ $eachLease->email }}</td>
                                    <!-- <td>{{ $eachLease->password }}</td> -->
                                    <td>{{ $eachLease->phone_number }}</td>
                                    <td>{{ $eachLease->address }}</td>
                                    <td>{{ $eachLease->credit }}</td>
                                    <td>
                                        <?php
                                        if($eachLease->status == 0){ //bị block
                                        ?>
                                        <a href="{{URL::to('/unblock-user/'.$eachLease->id_customer)}}">Unblock</a>
                                        <?php
                                        }else{ //if ($eachUser->_status==1) // active
                                        ?>
                                        <a href="{{URL::to('/block-user/'.$eachLease->id_customer)}}">Block</a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($eachLease->isprovider == 0){ //chưa được phép cho thuê đồ
                                        ?>
                                        <a href="{{URL::to('/make-provider-user/'.$eachLease->id_customer)}}">Make
                                            </a>
                                        <?php
                                        }else{ //if ($eachUser->isprovider==1) //được phép đăng sản phẩm cho thuê
                                        ?>
                                        <a href="{{URL::to('/unmake-provider-user/'.$eachLease->id_customer)}}">Unmake
                                            </a>
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
