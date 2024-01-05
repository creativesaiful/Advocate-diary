@extends('layouts.admin')

@section('content')
    <div class="p-3">

        <form method="POST" action="{{ route('case.store') }}">
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
                            placeholder="Enter Case No">
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="plaintiff">Plaintiff Name</label>
                        <input class="form-control" type="text" name="plaintiff" id="plaintiff" value="{{ old('plaintiff') }}" placeholder="Plaintiff Name " required>

                            @error('plaintiff')
                            <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{$message}}</li></ul>
                            @enderror
                     
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="defendant">Defendant Name</label>
                        <input class="form-control" type="text" name="defendant" id="defendant" value="{{ old('defendant') }}" placeholder="Defendant Name" required>

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
                        <input class="form-control" type="tel" name="contact" id="contact"  
                            placeholder="Contact Number" required> 

                            @error('contact')
                            <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                            @enderror
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="initial_date">Initial Date</label>
                        <input class="form-control" type="date" name="initial_date" id="initial_date"  required >

                        @error('initial_date')
                            <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                        @enderror
                        
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="short_order">Short Order</label>
                        <input class="form-control" type="text" name="short_order" id="short_order"  
                            placeholder="Short Order">

                            @error('short_order')
                            <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                         @enderror
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="next_stage">Next Stage</label>
                        <input class="form-control" type="text" name="next_stage" id="next_stage"  
                            placeholder="Next Stage">
                        
                            @error('next_stage')
                            <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                         @enderror
                    </div>

                </div>

                <div class="col-md-12">

                    <div class="form-group mb-3">
                        <label for="contact">Comment</label>
                        <div>
                            <textarea name="comment" class="form-control"></textarea>
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
