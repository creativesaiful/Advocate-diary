@extends('layouts.admin')

@section('content')
    <div class="p-3">

        <form method="POST" action="{{ route('casedate.update', $CaseDate->id) }}">
            @csrf
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label>Date</label>

                        <input class="form-control" type="date" value="{{ $CaseDate->date }}" name="next_date"
                            id="date">
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="caseno">Short Order</label>
                        <input class="form-control" type="text" name="short_order" id="short_order"
                            value="{{ $CaseDate->short_order }}">
                    </div>

                </div>



                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="next_stage">Next Stage</label>
                        <input class="form-control" type="text" name="next_stage" id="next_stage"
                            value="{{ $CaseDate->next_stage }}">
                    </div>

                </div>









                <div class="col-md-6">

                    <div class="form-group mb-3">
                        <label for="contact">Comment</label>
                        <div>
                            <textarea name="comment" class="form-control"> {{ $CaseDate->comment }}</textarea>
                        </div>
                    </div>

                </div>


            </div>






            <div class="form-group mb-0 text-center">
                <button class="btn btn-gradient btn-block" type="submit"> Update </button>
            </div>

        </form>

    </div>
@endsection
