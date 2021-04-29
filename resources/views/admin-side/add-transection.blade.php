@extends('setup.admin-setup.master-admin')

@section('content')

<!--== MAIN CONTRAINER ==-->


<!--== BODY CONTNAINER ==-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transection

        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>
            <li><a href="#"> Setup</a></li>
            <li><a href="#"> Transection</a></li>
            <li class="active"> Add Transection</li>
        </ol>
    </section>


    <form action="{{ url('store-Transaction') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Transection</h3>
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
                                <label for="">Transection Type</label>
                                <select class="form-control" name="trans_type" id="gender">
                                    <option value="">Select Transection Type</option>
                                    <option value="debit">Debit</option>
                                    <option value="credit">Credit</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Select Bank Name </label>
                                <select name="bank_id" id="" class="form-control">
                                    <option value="">Select Bank</option>
                                    <?php $role =DB::select('select * from banks'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->bank_name}}</option>
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
                                <label for="">Select Branch Name</label>
                                <select name="branch_id" id="" class="form-control">
                                    <option value="">Select Branch</option>
                                    <?php $role =DB::select('select * from banks'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->branch_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Select Party Name</label>
                                <select name="party_id" id="" class="form-control">
                                    <option value="">Select Party</option>
                                    <?php $role =DB::select('select * from parties'); ?>
                                    @foreach($role as $role)
                                    <option value="{{$role->id}}">{{$role->party_name}}</option>
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
                                <label for="">Check No.</label>
                                <input type="text" name="cheq_no" class="form-control" placeholder="Enter Check No Name..." required>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ammount</label>
                                <input type="text" name="amount" class="form-control" placeholder="Enter Ammount.." required>
                            </div>
                        </div>

                        <div class="col-md-2">

                        </div>
                    </div>


                    <div class="row">
                     
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="des" class="form-control" placeholder="Enter Description Name..." required>
                            </div>
                            </div>
                            <div class="col-md-2"></div>
                            
                

                        <!-- /.col -->
                        <div class="col-md-6" style="text-align: center;padding-top: 40px;">
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button style="background-color:#00A157;margin:0px !important;" type="button" class="btn bg-olive margin">Cancel</button>
                                <button style="background-color:#00A157;margin:0px !important;" type="submit" class="btn bg-olive margin" id="btnSave">Submit</button>
                                <a href="{{url('all-Transaction')}}" style="background-color:#00A157 ;margin:0px !important;" type="button" class="btn bg-olive margin"> View Banks List</a>
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
