@extends('setup.admin-setup.master-admin')

@section('content')

<!--== MAIN CONTRAINER ==-->


<!--== BODY CONTNAINER ==-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Passenger

        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
            <li><a href="#"> Setup</a></li>
            <li><a href="#"> Passenger</a></li>
            <li class="active"> Add Passenger</li>
        </ol>
    </section>


    <form action="{{ url('store-passenger') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Passenger</h3>
                </div>
                @if($message=Session::get('success'))

                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong> {{ $message}}</strong>
                </div>
                @endif



                <div class="alert alert-danger" style="display: none;"></div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Passenger Name</label>
                                <input type="text" name="passenger_name" class="form-control" placeholder="Please Enter Passenger Name..." required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Father/Husband Name</label>
                                <input type="text" name="father_name" class="form-control" placeholder="Please Father/Husband Name..." required>
                            </div>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                        <option value="">Select Gender:</option>
                                        <option value="MR">MR</option>
                                        <option value="MRS">MRS</option>
                                        <option value="MS">MS</option>
                                        <option value="MISS">MISS</option>
                                        <option value="MSTR">MSTR</option>
                                        <option value="INF">INF</option>
                                    </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Passport No:</label>
                                <input type="text" name="pass_no" class="form-control" placeholder="Enter Passport No.." required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Cnic No.</label>
                                <input type="text" name="cnic_no" class="form-control" placeholder="Please Enter Cnic No..." required>
                            </div>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Passport Issue Date</label>
                                <input type="date" name="pass_issue_date" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Passport Expiry Date</label>
                                <input type="date" name="pass_expiry_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone_no" class="form-control" placeholder="Please Enter Phone Number.." required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Please Enter Address..." required>
                            </div>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">

                        </div>


                        <!-- /.col -->
                        <div class="col-md-6" style="text-align: center;padding-top: 40px;">
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button style="background-color:#00A157;margin:0px !important;" type="button" class="btn bg-olive margin">Cancel</button>
                                <button style="background-color:#00A157;margin:0px !important;" type="submit" class="btn bg-olive margin" id="btnSave">Submit</button>
                                <a href="{{url('all-passenger')}}" style="background-color:#00A157 ;margin:0px !important;" type="button" class="btn bg-olive margin"> View Passenger List</a>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->

            <div class="row">
                <div class="col-md-6">

                </div>
                <!-- /.col (left) -->
                <div class="col-md-6">

                </div>
                <!-- /.col (right) -->
            </div>
            <!-- /.row -->


        </section>
        <!-- /.content -->

    </form>


</div>

@endsection
