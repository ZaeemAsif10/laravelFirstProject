@extends('setup.admin-setup.master-admin')

@section('content')

<!--== MAIN CONTRAINER ==-->


<!--== BODY CONTNAINER ==-->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Cariers

        </h1>

        <ol class="breadcrumb">

            <li><a href=""><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>

            <li><a href="#">Carier</a></li>

            <li class="active"> View Carier List</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                <div class="box box-success">

                    <div class="box-header with-border">



                        <div class="row">

                            <div class="col-md-3">

                                <h3 class="box-title"> View Carier List</h3>

                            </div>





                            <!-- /.col -->

                            <div class="col-md-6">



                            </div>

                            <div class="col-md-3" style="text-align: right; padding-top:30px;">

                                <!-- /.form-group -->

                                <div class="form-group no-print">

                                    <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="assets/dist/img/print.png"></a>

                                    <a href="{{url('add-carier')}}" title="Add New Carrier" class="hvr-grow" data-toggle="tooltip"><img src="assets/dist/img/add.png"></a>

                                </div>

                                <!-- /.form-group -->



                            </div>

                            <!-- /.col -->

                        </div>

                    </div>

                    @if($message=Session::get('success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ $message}}</strong>
                    </div>
                    @endif

                    @if($message=Session::get('failed'))

                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ $message}}</strong>
                    </div>
                    @endif


                    <!-- /.box-header -->

                    <div class="box-body">


                        <div class="alert alert-success" style="display: none;"></div>

                        <div class="table-responsive">

                            <table id="example1" class="table  table-striped table-hover js-basic-example dataTable">

                                <thead>

                                    <tr style="background:black;color:white">

                                        <th>SR#</th>
                                        <th>Airline Name</th>
                                        <th>Passenger Name</th>
                                        <th>Airline Code</th>
                                        <th>PNR +Ticket ID</th>
                                        <th>Airport Code</th>
                                        <th>Ticket Type</th>
                                        <th>Purchase Ammount</th>
                                        <th>Sale Ammount</th>
                                        <th>Date</th>
                                        <th>Action</th>




                                    </tr>

                                </thead>



                                <tbody id="showCarier">

                                </tbody>

                            </table>

                        </div>



                    </div>

                    <!-- /.box-body -->

                </div>

                <!-- /.box -->

            </div>

            <!-- /.col -->

        </div>

        <!-- /.row -->

    </section>

    <!-- /.content -->






</div>

<!-- Edit Modal Start -->
<!-- Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Carriers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update-carier') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id">

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
                    <div class="form-group">
                        <label for="">BPNR + Ticket ID</label>
                        <input type="text" name="pnr" class="form-control" placeholder="Please Enter Ticket ID..." required>
                    </div>
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
                    <div class="form-group">
                        <label for="">Select Type</label>
                        <select class="form-control" name="type" id="gender" required>
                            <option value="">Select Type</option>
                            <option value="one way">One Way</option>
                            <option value="two way">Two Way</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Purchase</label>
                        <input type="text" name="purchase" class="form-control" placeholder="Enter Purchase..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Sale</label>
                        <input type="text" name="sale" class="form-control" placeholder="Enter Sale..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="current_date" class="form-control" required>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Update Now</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Edit Modal End -->







<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript" async>
    employeeList();

    function employeeList() {


        $.ajax({

            url: '{{url("show-carier")}}',
            type: 'get',
            async: false,
            dataType: 'json',

            success: function(data) {

                var html = '';
                var i;
                var c = 0;

                for (i = 0; i < data.length; i++) {

                    c++;
                    html += '<tr>' +
                        '<td>' + c + '</td>' +
                        '<td>' + data[i].airline_name + '</td>' +
                        '<td>' + data[i].passenger_name + '</td>' +
                        '<td>' + data[i].airline_code + '</td>' +
                        '<td>' + data[i].pnr + '</td>' +
                        '<td>' + data[i].airport_code + '</td>' +
                        '<td>' + data[i].type + '</td>' +
                        '<td>' + data[i].purchase + '</td>' +
                        '<td>' + data[i].sale + '</td>' +
                        '<td>' + data[i].date + '</td>' +
                        '<td>' +
                        '<a href="javascript:" style="margin-right:10px;" data="' + data[i].id +
                        '" title="edit" class="btn-edit"><i class="fa fa-edit"></i></a>' +
                        '<a href="javascript:" data="' + data[i].id +
                        '" title="edit" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></i></a>' +
                        '</td>' +
                        '</tr>';
                }

                $('#showCarier').html(html);

            },
            error: function()

            {
                swal({
                    icon: "error",
                    text: "Check form and queries !",
                });
                //alert('some thing went wrong');
            }

        });
    }


    // Ajax Call for Edit
    $('#showCarier').on('click', '.btn-edit', function() {

        $('#edit-modal').modal('show');

        var id = $(this).attr('data');

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '{{url("edit-carier")}}',
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {

                $('input[name=id]').val(data[0].id);
                $('select[name=airline_id]').val(data[0].airline_id);
                $('select[name=passenger_id]').val(data[0].passenger_id);
                $('select[name=airline_code]').val(data[0].airline_code);
                $('input[name=pnr]').val(data[0].pnr);
                $('select[name=airport_code]').val(data[0].airport_code);
                $('select[name=type]').val(data[0].type);
                $('input[name=purchase]').val(data[0].purchase);
                $('input[name=sale]').val(data[0].sale);
                $('input[name=current_date]').val(data[0].date);

            },
            error: function() {
                alert("error");

            }
        });

    });

    //ajax call for Delete Record..
    $('#showCarier').on('click', '.btn-delete', function() {

        var id = $(this).attr('data');

        $.ajax({

            type: 'ajax',
            method: 'get',
            url: '{{url("delete-carier")}}',
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {

                employeeList();

                swal({
                    icon: "success",
                    text: "Record deleted !!",
                });



            },

            error: function() {
                swal({
                    icon: "error",
                    text: "Check form and queries !",
                });

            }

        });

    });

</script>
@endsection
