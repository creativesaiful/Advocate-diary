@extends('layouts.admin')

@section('content')
    <!-- Custom Modals -->
    <div class="row">
        <div class="col-12">
            <div class="card-box">



                <div class="button-list text-right">

                    <!-- Custom width modal -->
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target="#signup-modal"> Add New Court </button>

                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title"><b>Court List</b></h4>


                            <table id="court_table" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Court Name</th>
                                        <th>Judge Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>


                                <tbody>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->



                <!-- Signup modal content -->
                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                <h2 class="text-uppercase text-center mb-4">
                                    Add New Court
                                </h2>


                                <form class="form-horizontal" id="add_court_form">
                                    @csrf
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="courtname">Court Name</label>
                                            <input class="form-control" type="text" id="courtname" name="court_name">
                                        </div>

                                        <div class="col-12">
                                            <p class="text-danger error"></p>
                                        </div>


                                    </div>

                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="judgename">Judge Name</label>
                                            <input class="form-control" type="text" id="judgename" name="judge_name">
                                        </div>
                                    </div>



                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light"
                                                type="button" id="add_court">Submit</button>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



                {{-- Edit modal content --}}
                <div id="edit_court" class="modal fade" tabindex="-1" role="dialog"
                    aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                                <h2 class="text-uppercase text-center mb-4">
                                    Edit Court
                                </h2>

                                <form class="form-horizontal" id="edit_court_form">
                                    @csrf


                                    <input type="hidden" id="edit_court_id" name="edit_court_id">

                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="edit_court_name">Court Name</label>
                                            <input class="form-control" type="text" id="edit_court_name"
                                                name="court_name">
                                        </div>

                                        <div class="col-12">
                                            <p class="text-danger error"></p>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-12">
                                            <label for="edit_judge_name">Judge Name</label>
                                            <input class="form-control" type="text" id="edit_judge_name"
                                                name="judge_name">
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center">
                                        <div class="col-12">
                                            <button class="btn width-lg btn-rounded btn-primary waves-effect waves-light"
                                                type="button" id="update_court">Update</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->



            </div>
        </div><!-- end col -->
    </div>
    <!-- End row -->
@endsection

@section('js')


    <script>
        $(document).ready(function() {
            $('#add_court').on('click', function() {
                $data = $('#add_court_form').serialize();
                $.ajax({
                    url: "{{ route('courts.store') }}",
                    type: "POST",
                    data: $data,
                    success: function(data) {
                        if (data.status == 500) {
                            $('.error').text(data.message);
                        } else {
                            $.toast({
                                heading: "Well done!",
                                text: "Court Added successfully",
                                position: "top-right",
                                loaderBg: "#5ba035",
                                icon: "success",
                                hideAfter: 3e3,
                                stack: 1
                            });

                            $('#signup-modal').modal('hide');
                            courtList();
                            $('#add_court_form')[0].reset();
                            $('.error').text('');
                        }
                    }
                })
            });
        });

        courtList();



        function courtList() {
            // Make an AJAX request using jQuery
            $.ajax({
                type: "GET", // HTTP method (POST in this case)
                dataType: 'json', // Expected data type (JSON)
                url: '{{ route('courts.list') }}', // Server endpoint URL
                success: function(data) {
                    // Callback function to handle the successful response
                 
                    // Initialize DataTable with received data.
                    var i = 1;
                    $('#court_table').dataTable({
                        data: data, // Data to be displayed in the table

                        columns: [
                            // need to show serial number in first culomn


                            {
                                "render": function(data, type, full, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "court_name"
                            },
                            {
                                "data": "judge_name"
                            },
                            {
                                "data": "action",
                                render: function(data, type, row) {
                                    return '<a href="javascript:void(0)" class="action-edit btn btn-gradient btn-rounded waves-light waves-effect width-md" data-id="' +
                                        row.id +
                                        '">Edit</a>  <a href="javascript:void(0)" class="action-delete btn btn-danger btn-rounded waves-light waves-effect width-md" data-id="' +
                                        row.id + '">Delete</a>';
                                }
                            } // action column
                        ],
                        "bDestroy": true
                    });
                },
                // Add error handling if needed
            });
        }

        //Edit court
        $(document).on('click', '.action-edit', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ url('courts/edit') }}" + '/' + id,
                success: function(data) {
                    $('#edit_court').modal('show');
                    $('#edit_court_name').val(data.court_name);
                    $('#edit_judge_name').val(data.judge_name);
                    $('#edit_court_id').val(data.id);

                }
            })
        });

        //Update court
        $(document).on('click', '#update_court', function() {
            var id = $('#edit_court_id').val();
            $data = $('#edit_court_form').serialize();
            $.ajax({
                type: "POST",
                url: "{{ url('courts/update') }}" + '/' + id,
                data: $data,
                success: function(data) {
                    if (data.status == 500) {
                        $('.error').text(data.message);
                    } else {
                        $.toast({
                            heading: "Well done!",
                            text: "Court Updated successfully",
                            position: "top-right",
                            loaderBg: "#5ba035",
                            icon: "success",
                            hideAfter: 3e3,
                            stack: 1
                        });
                        $('#edit_court').modal('hide');
                        courtList();

                        $('#edit_court_form')[0].reset();
                        $('.error').text('');
                    }
                }
            })
        });


        $(document).on('click', '.action-delete', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ url('courts/delete') }}" + '/' + id,

                success: function(data) {
                    $.toast({
                        heading: "Well done!",
                        text: "Court Deleted successfully",
                        position: "top-right",
                        loaderBg: "#5ba035",
                        icon: "success",
                        hideAfter: 3e3,
                        stack: 1
                    });
                    courtList();
                }
            })
        });
    </script>
@endsection
