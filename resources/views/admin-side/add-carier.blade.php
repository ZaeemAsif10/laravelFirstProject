@extends('setup.admin-setup.master-admin')

@section('content')

<!--== MAIN CONTRAINER ==-->


<!--== BODY CONTNAINER ==-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Carriers

        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
            <li><a href="#"> Setup</a></li>
            <li><a href="#"> Carrier</a></li>
            <li class="active"> Add Carrier</li>
        </ol>
    </section>


    <form action="{{ url('store-carier') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Carrier</h3>
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
                                <label for="">Select Airline Name </label>
                                <select name="airline_id" id="" class="form-control">
                                    <option value="">Select Airline</option>
                                    <?php $role =DB::select('select * from airlines'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->airline_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Select Passenger Name </label>
                                <select name="passenger_id" id="" class="form-control" required>
                                    <option value="">Select Passenger</option>
                                    <?php $role =DB::select('select * from passengers'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->passenger_name}}</option>
                                    @endforeach
                                </select>
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
                                <label for="">Select Airline Code </label>
                                <select name="airline_code" id="" class="form-control" required>
                                    <option value="">Select Code</option>
                                    <?php $role =DB::select('select * from airlines'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->airline_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">BPNR + Ticket ID</label>
                                <input type="text" name="pnr" class="form-control" placeholder="Please Enter Ticket ID..." required>
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
                                <label for="">Select Airport Code </label>
                                <select name="airport_code" id="" class="form-control" required>
                                    <option value="">Select Airport Code</option>
                                    <?php $role =DB::select('select * from airports'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->airport_code}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Select Type</label>
                                <select class="form-control" name="type" id="gender" required>
                                    <option value="">Select Type</option>
                                    <option value="one way">One Way</option>
                                    <option value="two way">Two Way</option>
                                </select>
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
                               <label for="">Purchase</label>
                                <input type="text" name="purchase" class="form-control" placeholder="Enter Purchase..." required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                               <label for="">Sale</label>
                                <input type="text" name="sale" class="form-control" placeholder="Enter Sale..." required>
                            </div>
                        </div>
                        
                        

                        <div class="col-md-2">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            </div>
                            <div class="col-md-2"></div>

                        </div>


                        <!-- /.col -->
                        <div class="col-md-6" style="text-align: center;padding-top: 40px;">
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button style="background-color:#00A157;margin:0px !important;" type="button" class="btn bg-olive margin">Cancel</button>
                                <button style="background-color:#00A157;margin:0px !important;" type="submit" class="btn bg-olive margin" id="btnSave">Submit</button>
                                <a href="{{url('all-carier')}}" style="background-color:#00A157 ;margin:0px !important;" type="button" class="btn bg-olive margin"> View Carrier List</a>
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
