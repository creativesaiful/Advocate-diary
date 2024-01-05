@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
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
                    <th>Contact</th>
                    <th>Comment</th>
                    <th>Action</th>
                </tr>
                </thead>


                <tbody>
                
                @foreach ($caseList as $key => $case )
                            
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $case->courts->court_name }}</td>
                        <td> {{ $case->case_no}} </td>
                        <td>{{ $case->plaintiff }}</td>
                        <td>{{ $case->defendant }}</td>
                        <td> {{ $case->our_position }}</td>
                        <td> {{ $case->contact }} </td>
                        <td> {{ $case->comment }} </td>
                        <td>
                            <a href="{{route('case.edit', $case->id)}}" class="btn btn-sm btn-primary waves-effect waves-light"> <i class="fa fa-edit" aria-hidden="true"></i> </a>

                            <a href="{{route('case.delete', $case->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger waves-effect waves-light"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                            
                            <a href="{{route('case.details', $case->id)}}" class="btn btn-sm btn-primary waves-effect waves-light"> Details </a>
                       
                        </td>
                    </tr>

                        @endforeach

                
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
