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

            <li><a href="#">Transection</a></li>

            <li class="active"> View Transection List</li>

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

                                <h3 class="box-title"> View Transection List</h3>

                            </div>





                            <!-- /.col -->

                            <div class="col-md-6">



                            </div>

                            <div class="col-md-3" style="text-align: right; padding-top:30px;">

                                <!-- /.form-group -->

                                <div class="form-group no-print">

                                    <a onClick="window.print()" title="Print" class="hvr-grow" data-toggle="tooltip"><img class="marginRight20px" src="assets/dist/img/print.png"></a>

                                    <a href="{{url('add-Transaction')}}" title="Add New Transection" class="hvr-grow" data-toggle="tooltip"><img src="assets/dist/img/add.png"></a>

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
                                        <th>Transection Type</th>
                                        <th>Bank Name</th>
                                        <th>Branch Name</th>
                                        <th>Party Name</th>
                                        <th>Cheq No.</th>
                                        <th>Ammount</th>
                                        <th>Action</th>




                                    </tr>

                                </thead>



                                <tbody id="showTransection">

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Transection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('update-Transaction') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <label for="">Transection Type</label>
                        <select class="form-control" name="trans_type" id="gender">
                            <option value="">Select Transection Type</option>
                            <option value="debit">Debit</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>
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

                    <div class="form-group">
                        <label for="">Check No.</label>
                        <input type="text" name="cheq_no" class="form-control" placeholder="Enter Check No Name..." required>
                    </div>
                    <div class="form-group">
                        <label for="">Ammount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Ammount.." required>
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

            url: '{{url("show-Transaction")}}',
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
                        '<td>' + data[i].trans_type + '</td>' +
                        '<td>' + data[i].bank_name + '</td>' +
                        '<td>' + data[i].branch_name + '</td>' +
                        '<td>' + data[i].party_name + '</td>' +
                        '<td>' + data[i].cheq_no + '</td>' +
                        '<td>' + data[i].amount + '</td>' +
                        '<td>' +
                        '<a href="javascript:" style="margin-right:10px;" data="' + data[i].id +
                        '" title="edit" class="btn-edit"><i class="fa fa-edit"></i></a>' +
                        '<a href="javascript:" data="' + data[i].id +
                        '" title="edit" class="btn-delete"><i class="fa fa-trash" aria-hidden="true"></i></i></a>' +
                        '</td>' +
                        '</tr>';
                }

                $('#showTransection').html(html);

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
    $('#showTransection').on('click', '.btn-edit', function() {

        $('#edit-modal').modal('show');

        var id = $(this).attr('data');

        $.ajax({
            type: 'ajax',
            method: 'get',
            url: '{{url("edit-Transaction")}}',
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {

                $('input[name=id]').val(data[0].id);
                $('select[name=trans_type]').val(data[0].trans_type);
                $('select[name=bank_id]').val(data[0].bank_id);
                $('select[name=branch_id]').val(data[0].branch_id);
                $('select[name=party_id]').val(data[0].party_id);
                $('input[name=cheq_no]').val(data[0].cheq_no);
                $('input[name=amount]').val(data[0].amount);

            },
            error: function() {
                alert("error");

            }
        });

    });

    //ajax call for Delete Record..
    $('#showTransection').on('click', '.btn-delete', function() {

        var id = $(this).attr('data');

        $.ajax({

            type: 'ajax',
            method: 'get',
            url: '{{url("delete-Transaction")}}',
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
