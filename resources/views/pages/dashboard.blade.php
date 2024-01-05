@extends('layouts.admin')

@section('content')
    <h2>Dashboard</h2>
    <div class="p-3">
        <form method="POST" action="{{ route('dashboard') }}">
            @csrf
    
            <div class="row">
                <div class="col-md-6">
    
                    <div class="form-group mb-3">
    
                        <input class="form-control" type="date" name="next_date" id="initial_date"  required >
    
                        @error('next_date')
                            <ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">{{ $message }}</li></ul>
                        @enderror
                        
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-gradient btn-block" type="submit"> Search </button>
                    </div>
                </div>
            </div>
    
    
        </form>
    
    </div>

    @include('components.case-list-component', ['cases' => $TodayCases])
@endsection