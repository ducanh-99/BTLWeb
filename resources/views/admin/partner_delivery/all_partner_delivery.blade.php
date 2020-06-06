@extends('admin.welcomeAdmin')
@section('all_branch_category')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Partner Delivery List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Form add new product -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add new partner delivery</button>
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog modal-lg-12" role="document">
                                <div class="modal-content">
                                    <div class="modal-body ">
                                        <section>
                                            <div >
                                                <div class="row">
                                                    <!-- left column -->

                                                    <div class="col-md-12">
                                                        <!-- general form elements -->
                                                        <div class="card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">New partner delivery</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <!-- form start -->
                                                            <form action="{{URL::to('/save-partner-delivery')}}" method="GET">
                                                                {{ csrf_field() }}
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label>partner delivery Name</label>
                                                                        <input type="text" class="form-control" name="name" id="name" placeholder="partner delivery name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label >shipping fee</label>
                                                                        <input type="text" class="form-control" name="shipping_fee" id="shipping_fee" placeholder="shipping fee">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>return fee</label>
                                                                        <input type="text" class="form-control" name="return_fee" id="return_fee" placeholder="return fee">
                                                                    </div>
                                                                    <!-- /.card-body -->

                                                                    <div class="card-footer">
                                                                        <button type="submit" name="add_branch" class="btn btn-primary">Add New Partner Delivery</button>
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
                                <th>ID Partner Delivery</th>
                                <th>Name</th>
                                <th>Shipping fee</th>
                                <th>Return fee</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allPartnerDelivery as $eachPartnerDelivery)
                                <tr>
                                    <td>{{ $eachPartnerDelivery->id_partner_delivery }}</td>
                                    <td>{{ $eachPartnerDelivery->name }}</td>
                                    <td>{{ $eachPartnerDelivery->shipping_fee }}</td>
                                    <td>{{ $eachPartnerDelivery->return_fee }}</td>
                                    <td>
                                        <a href="{{URL::to('/edit-partner-delivery/'.$eachPartnerDelivery->id_partner_delivery)}}">Edit Partner Delivery</a>
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
