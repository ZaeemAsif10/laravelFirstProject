@extends('setup.admin-setup.master-admin')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin-home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>



    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Vendor</span>
                        <?php   $data = DB::select("select count(id) as party from parties");
                        foreach($data as $data)
                        {
                            $count =$data->party;
                        }
                        ?>

                        <span class="info-box-number">{{$count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Passenger</span>

                        <?php $pass = DB::select("select count(id) as passenger from 
                            passengers");
                        
                            foreach($pass as $pass)
                            {
                                $passenger = $pass->passenger;
                            }
                        ?>

                        <span class="info-box-number">{{$passenger}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Airlines</span>

                        <?php
                        $air = DB::select("select count(id) as airline from airlines");
                        
                        foreach($air as $air)
                        {
                            $airline = $air->airline;
                        }
                        
                        ?>

                        <span class="info-box-number">{{$airline}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bank Transection</span>

                        <?php
                        $bank = DB::select("select count(id) as bank from transactions");
                        
                        foreach($bank as $bank)
                        {
                            $transection = $bank->bank;
                        }
                        
                        ?>

                        <span class="info-box-number">{{$transection}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- /.box -->
                <div class="row">


                    <div class="col-md-12">
                        <!-- USERS LIST -->
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Clients</h3>

                                <div class="box-tools pull-right">

                                    <span class="label label-danger">10 New Members</span>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">



                                    <li>
                                        <img src="{{asset('assets/uploads/client-images/')}}" alt="" height="50px" width="50px" class="img">
                                        <a class="users-list-name" href="#">Salman</a>
                                        <span class="users-list-date">10-12-2020</span>
                                    </li>



                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="{{url('/all-client')}}" class="uppercase">View All Clients</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Latest Carrier</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                    <tr>
                                        <th>SR#</th>
                                        <th>Airline Name </th>
                                        <th>Passenger Name </th>
                                        <th>Airline Code</th>
                                        <th>Tiket ID</th>
                                        <th>Ticket Type</th>

                                    </tr>
                                </thead>
                                <?php
                                $data = DB::select("SELECT c.*,a.airline_name,p.passenger_name,a.airline_code FROM carriers c JOIN airlines a JOIN passengers p WHERE c.airline_id = a.id AND c.passenger_id = p.id");
                               
                                ?>
                                <tbody>
                                    @foreach($data as $item)
                                
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->airline_name}}</td>
                                        <td>{{$item->passenger_name}}</td>
                                        <td>{{$item->airline_code}}</td>
                                        <td>{{$item->pnr}}</td>
                                        <td>{{$item->type}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">

                        <a href="{{url('sale')}}" class="btn btn-sm btn-info btn-flat pull-right">View All Sales</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-4">



                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Feedbacks</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">



                            <li class="item">
                                <div class="product-img">
                                    <img src="{{asset('assets/uploads/staff-images/')}}" alt="" height="50px" width="50px" class="img img-circle">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Salman
                                    </a>
                                    <span class="product-description">



                                    </span>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{url('/client-feedback')}}" class="uppercase">View All Fedbacks</a>
                    </div>
                    <!-- /.box-footer -->
                </div>

                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Projects</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">


                            <li class="item">
                                <table class="table">
                                    <tr>
                                        <th>SR</th>
                                        <th>Project Name</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>

                                    <tr>
                                        <td>1</td>
                                        <td>A Studio</td>
                                        <td>300</td>
                                        <td>20-2-2021</td>

                                    </tr>

                                </table>
                            </li>



                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{url('all-project')}}" class="uppercase">View All Projects</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>


</div>

@endsection
