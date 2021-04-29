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

            <li><a href="#">Passenger</a></li>

            <li class="active"> View Passenger List</li>

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

                                <h3 class="box-title"> View Passenger List</h3>

                            </div>





                            <!-- /.col -->

                            <div class="col-md-6">



                            </div>

                            <div class="col-md-3" style="text-align: right; padding-top:30px;">

                                <!-- /.form-group -->

                                <div class="form-group no-print">

                                    <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="assets/dist/img/print.png"></a>

                                    <a href="{{url('add-passenger')}}" title="Add New Passenger" class="hvr-grow" data-toggle="tooltip"><img src="assets/dist/img/add.png"></a>

                                </div>

                                <!-- /.form-group -->



                            </div>

                            <!-- /.col -->

                        </div>

                    </div>
                    
                    <!--Message for Success-->
                    @if($message=Session::get('success'))

                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ $message}}</strong>
                    </div>
                    @endif
                        
                    <!--Message for Error-->
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
                                        <th>Passenger Name</th>
                                        <th>Father/Husband Name</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Pass No</th>
                                        <th>Pass Issue Date</th>
                                        <th>Pass Expiry Date</th>
                                        <th>Action</th>




                                    </tr>

                                </thead>



                                <tbody id="showPassenger">

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Passengers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update-passenger') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="">Passenger Name</label>
                        <input type="text" name="passenger_name" class="form-control" placeholder="Please Enter Passenger Name..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Father/Husband Name</label>
                        <input type="text" name="father_name" class="form-control" placeholder="Please Father/Husband Name..." required>
                    </div>
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
                    <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Passport No:</label>
                        <input type="text" name="pass_no" class="form-control" placeholder="Enter Passport No.." required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Passport Issue Date</label>
                        <input type="date" name="pass_issue_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Passport Expiry Date</label>
                        <input type="date" name="pass_expiry_date" class="form-control" required>
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

            url: '{{url("show-passenger")}}',
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
                        '<td>' + data[i].passenger_name + '</td>' +
                        '<td>' + data[i].father_name + '</td>' +
                        '<td>' + data[i].gender + '</td>' +
                        '<td>' + data[i].dob + '</td>' +
                        '<td>' + data[i].pass_no + '</td>' +
                        '<td>' + data[i].pass_issue_date + '</td>' +
                        '<td>' + data[i].pass_expiry_date + '</td>' +
                        '<td>' +
                        '<a href="javascript:" style="margin-right:10px;" data="' + data[i].id +
                        '" title="edit" class="btn-edit"><i class="fa fa-edit"></i></a>' +
                        '<a href="javascript:" data="' + data[i].id +
                        '" title="edit" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></i></a>' +
                        '</td>' +
                        '</tr>';
                }

                $('#showPassenger').html(html);

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
    $('#showPassenger').on('click', '.btn-edit', function() {

        $('#edit-modal').modal('show');

        var id = $(this).attr('data');

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '{{url("edit-passenger")}}',
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {

                $('input[name=id]').val(data[0].id);
                $('input[name=passenger_name]').val(data[0].passenger_name);
                $('input[name=father_name]').val(data[0].father_name);
                $('select[name=gender]').val(data[0].gender);
                $('input[name=dob]').val(data[0].dob);
                $('input[name=pass_no]').val(data[0].pass_no);
                $('input[name=pass_issue_date]').val(data[0].pass_issue_date);
                $('input[name=pass_expiry_date]').val(data[0].pass_expiry_date);
            },
            error: function() {
                alert("error");

            }
        });

    });

    //ajax call for Delete Record..
    $('#showPassenger').on('click', '.btn-delete', function() {

        var id = $(this).attr('data');

        $.ajax({

            type: 'ajax',
            method: 'get',
            url: '{{url("delete-bank")}}',
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
