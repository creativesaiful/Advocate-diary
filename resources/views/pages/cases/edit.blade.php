@extends('layouts.admin')

@section('content')
<div class="p-3">

    <form method="POST" action="{{ route('case.update', $case->id) }}">
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label>Court name</label>
                    <div class="">

                        <select class="form-control" name="court_id">
                            @foreach ($courts as $court)
                                <option value="{{ $court->id }}"> {{ $court->court_name }} </option>
                            @endforeach
                        </select>



                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label for="caseno">Case No</label>
                    <input class="form-control" type="text" name="case_no" id="caseno"
                        value="{{$case->case_no }}">
                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label for="plaintiff">Plaintiff Name</label>
                    <input class="form-control" type="text" name="plaintiff" id="plaintiff" value="{{$case->plaintiff }}" placeholder="Plaintiff Name " required>

                        @error('plaintiff')
                        <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{$message}}</li></ul>
                        @enderror
                 
                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label for="defendant">Defendant Name</label>
                    <input class="form-control" type="text" name="defendant" id="defendant" value="{{$case->defendant }}" placeholder="Defendant Name" required>

                        @error('defendant')
                        <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                        @enderror
                </div>

            </div>


            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label>Our Position </label>
                    <div class="">

                        <select class="form-control" name="our_position" required>

                            <option value="plaintiff"> Plaintiff </option>
                            <option value="defendant"> Defendant</option>

                        </select>



                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="form-group mb-3">
                    <label for="contact">Contact Number</label>
                    <input class="form-control" type="text" name="contact" id="contact"  
                        placeholder="Contact Number" value="{{$case->contact }}" required> 

                        @error('contact')
                        <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                        @enderror
                </div>

            </div>

          
       

          

            <div class="col-md-12">

                <div class="form-group mb-3">
                    <label for="contact">Comment</label>
                    <div>
                        <textarea name="comment" class="form-control"> {{$case->comment }}</textarea>
                    </div>
                </div>

            </div>


        </div>






        <div class="form-group mb-0 text-center">
            <button class="btn btn-gradient btn-block" type="submit"> Submit New Case </button>
        </div>

    </form>

</div>

@endsection