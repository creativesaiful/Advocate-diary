
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive" >
            <h4 class="header-title"><b>Case List</b></h4>
         

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Court Name</th>
                    <th>Case No</th>
                    <th>Plaintiff</th>
                    <th>Defendant</th>
                    <th>Our Position</th>
                    <th>Stage</th>
                    <th>Contact</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                
                @foreach ($TodayCases as $key => $cases )
                            
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $cases->case['courts']->court_name }}</td>
                        <td> {{ $cases->case->case_no}} </td>
                        <td>{{  $cases->case->plaintiff }}</td>
                        <td>{{ $cases->case->defendant }}</td>
                        <td> {{ $cases->case->our_position }}</td>
                        <td> {{ $cases->next_stage }} </td>
                        <td> <a href="callto:{{ $cases->case->contact}}"> {{ $cases->case->contact }} </a> </td>
                        <td> {{ $cases->comment }} </td>
                        <td>
                            <a href="{{route('casedate.edit', $cases->id)}}" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="fa fa-edit" aria-hidden="true"></i> </a>

                           
                            {{-- Open a form modal to update on clickig this --}}

                            <a type="button" class="btn btn-primary waves-effect waves-light next-date-btn" data-toggle="modal" 
                            data-target="#signup-modal" data-id="{{$cases->case_id}}" > Update </a>

                            <a href="{{route('case.details', $cases->case_id)}}" class="btn btn-sm btn-primary waves-effect waves-light"> Details </a>
    
                            
                        </td>
                    </tr>

                        @endforeach

                
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
                  Add Next Date
              </h2>


              <form class="form-horizontal" id="add_next_date">
                  @csrf
                  <input type="text" name="case_id" id="case_id">
                  <div class="form-group">
                      <div class="col-12">
                          <label for="short_order">Short Order</label>
                          <input class="form-control" type="text" id="short_order" name="short_order">
                      </div>

                      <div class="col-12">
                          <p class="text-danger error"></p>
                      </div>


                  </div>

                  <div class="form-group">
                      <div class="col-12">
                          <label for="next_date">Next Date</label>
                          <input class="form-control" type="date" min="<?= date('Y-m-d'); ?>" id="next_date" name="next_date">
                      </div>
                  </div>



                  <div class="form-group">
                    <div class="col-12">
                        <label for="next_stage">Next Stage</label>
                        <input class="form-control" type="text" id="next_stage" name="next_stage">
                    </div>

                    <div class="col-12">
                        <p class="text-danger error"></p>
                    </div>


                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label for="next_stage">Comment</label>
                       <textarea name="comment" class="form-control" id="" cols="10" rows="3"></textarea>
                    </div>

                    <div class="col-12">
                        <p class="text-danger error"></p>
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


@section('js')
<script>
     $(document).on('click', '.next-date-btn', function() {
        var id = $(this).data('id');
        $('#case_id').val(id);

        $('#add_court').on('click', function() {
                $data = $('#add_next_date').serialize();

                $.ajax({
                    url: "{{ route('date.update') }}",
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
                            $('#add_next_date')[0].reset();
                            $('.error').text('');
                        }
                    }
                })
        })

     });

</script>
@endsection