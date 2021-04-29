@extends('setup.admin-setup.master-admin')

@section('content')

<!--== MAIN CONTRAINER ==-->


<!--== BODY CONTNAINER ==-->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Airlines

        </h1>

        <ol class="breadcrumb">

            <li><a href=""><i class="fas fa-arrow-alt-circle-right"></i> Home</a></li>

            <li><a href="#">Airline</a></li>

            <li class="active"> View Airlines List</li>

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

                                <h3 class="box-title"> View Airlines List</h3>

                            </div>





                            <!-- /.col -->

                            <div class="col-md-6">



                            </div>

                            <div class="col-md-3" style="text-align: right; padding-top:30px;">

                                <!-- /.form-group -->

                                <div class="form-group no-print">

                                    <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="assets/dist/img/print.png"></a>

                                    <a href="{{url('add-airline')}}" title="Add New Airline" class="hvr-grow" data-toggle="tooltip"><img src="assets/dist/img/add.png"></a>

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
                                        <th>Airline Code</th>
                                        <th>Airline Country</th>
                                        <th>Description</th>
                                        <th>Action</th>


                                    </tr>

                                </thead>



                                <tbody id="showAirline">

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Airlines</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update-airline') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="">Airline Name</label>
                        <input type="text" name="airline_name" class="form-control" placeholder="Enter Airline Name..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Airline Code</label>
                        <input type="text" name="airline_code" class="form-control" placeholder="Airline Code.." required>
                    </div>
                    <div class="form-group">
                        <label for="">Airline Country</label>
                        <input type="text" name="airline_country" class="form-control" placeholder="Enter Airline Country..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Description" required>
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

            url: '{{url("show-airline")}}',
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
                        '<td>' + data[i].airline_code + '</td>' +
                        '<td>' + data[i].airline_country + '</td>' +
                        '<td>' + data[i].description + '</td>' +
                        '<td>' +
                        '<a href="javascript:" style="margin-right:10px;" data="' + data[i].id +
                        '" title="edit" class="btn-edit"><i class="fa fa-edit"></i></a>' +
                        '<a href="javascript:" data="' + data[i].id +
                        '" title="edit" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></i></a>' +
                        '</td>' +
                        '</tr>';
                }

                $('#showAirline').html(html);

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
    $('#showAirline').on('click', '.btn-edit', function() {

        $('#edit-modal').modal('show');

        var id = $(this).attr('data');

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '{{url("edit-airline")}}',
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {

                $('input[name=id]').val(data[0].id);
                $('input[name=airline_name]').val(data[0].airline_name);
                $('input[name=airline_code]').val(data[0].airline_code);
                $('input[name=airline_country]').val(data[0].airline_country);
                $('input[name=description]').val(data[0].description);

            },
            error: function() {
                alert("error");

            }
        });

    });

    //ajax call for Delete Record..
    $('#showAirline').on('click', '.btn-delete', function() {

        var id = $(this).attr('data');

        $.ajax({

            type: 'ajax',
            method: 'get',
            url: '{{url("delete-airline")}}',
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
