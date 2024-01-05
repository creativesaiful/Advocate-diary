@extends('layouts.admin')

@section('content')


<h3 class="my-3">Court Name: {{$caseDetails[0]['case']['courts']->court_name }}</h3>

<div class="row border-bottom my-3 p-2">
    <div class="col-md-6">

        <div class="">
            <h5>Plaintiff: {{$caseDetails[0]['case']->plaintiff }} </h5>
        </div>

    </div>

    <div class="col-md-6">

        <h5>Defendant: {{$caseDetails[0]['case']->defendant }} </h5>

    </div>
</div>

<div class="row">
    @foreach ($caseDetails as $key => $details)

    
 


    <div class="col-md-6">
        <div class="card p-3">
            <div class="row">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    <h2 class="bg-primary text-white rounded rounded-full text-center p-2">{{ $key+1 }}</h2>
                </div>

                <div class="col-9">
                    <div class="card-header">
                        <h4 class="bg-primary text-white rounded rounded-full text-left p-2">
                            @php
                            echo date('d-M-Y', strtotime($details->next_date));
                        @endphp
                        </h4>

                        <h4>Sort Order: {{ $details->short_order }}</h4>
                        <h5>Stage: {{ $details->next_stage }}</h5>
                        <h6>Comment: {{ $details->comment }}</h6>
                      
                    </div>

                </div>
            </div>
         
          
        
        </div>
    </div>
    @endforeach
</div>




@endsection