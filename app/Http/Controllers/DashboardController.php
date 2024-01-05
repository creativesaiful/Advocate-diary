<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseDate;

class DashboardController extends Controller
{
    public function Dashboard( Request $request){
        $date = $request->next_date ?? date('Y-m-d');

        $TodayCases = CaseDate::where('user_id', auth()->user()->id)->where('next_date', $date)-> with('case')->get();

        return view('pages.dashboard', compact('TodayCases'));
    }

    public function CaseDateEdit($id){

        $CaseDate = CaseDate::where('id', $id)->first();
        return view('pages.case-dates.case-date-edit', compact('CaseDate'));
    }


    public function CaseDateUpdate(Request $request, $id){


      
        $CaseDate = CaseDate::where('id', $id)->first();

        if($request->next_date){
            $CaseDate -> next_date = $request->next_date;
        }
        $CaseDate -> short_order = $request->short_order;
        $CaseDate -> next_stage = $request->next_stage;
        $CaseDate -> comment = $request->comment;

        $CaseDate->save();


         toastr()->success('Case updated successfully');
        return redirect()->back();
    }



    public function DateUpdate(Request $request){
        try {
            $request->validate([
                'next_date' => 'required',
                'next_stage' => 'required',
            ]);
           

            CaseDate::create([
                'user_id' => auth()->user()->id,
                'case_id' => $request->case_id,
                'next_date' => $request->next_date,
                'next_stage' => $request->next_stage,
                'short_order' => $request->short_order,
                'comment' => $request->comment,
            ]);

            return response()->json([
                'message' => 'Date Updated successfully',
                'status' => 200
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 500
            ]);
        }
    }
}
