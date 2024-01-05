<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\CaseList;
use App\Models\Court;
use App\Http\Requests\CaseStoreRequest;
use App\Models\CaseDate;
use Brian2694\Toastr\Facades\Toastr;



class CaseController extends Controller
{
    public function caseList(){
        $caseList = CaseList::where('user_id', auth()->user()->id)->with('courts')->get();

      
        return view('pages.cases.index', compact('caseList'));
    }

    public function create(){
        
        $courts = Court::where('user_id', auth()->user()->id)->get();
        return view('pages.cases.create', compact('courts'));
    }


    public function store(CaseStoreRequest $request){
        $validated = $request->validated();
 
        $checkExistCase = CaseList::where('case_no', $request->case_no)->where('user_id', auth()->user()->id)->where('court_id', $request->court_id)->first();

        
        if($checkExistCase){
            toastr()->error('Case already exist');
            return redirect()->back();
        }
    

        $caseId = CaseList::insertGetId([
            'user_id' => auth()->user()->id,
            'court_id' => $request->court_id,
            'case_no' => $request->case_no,
            'plaintiff' => $request->plaintiff,
            'defendant' => $request->defendant,
            'our_position' => $request->our_position,
            'contact' => $request->contact,
            'comment' => $request->comment,
        ]);

        CaseDate::insert([
            'case_id' => $caseId,
            'user_id' => auth()->user()->id,
            'initial_date' => $request->initial_date,
            'short_order'=> $request->short_order,
            'next_stage' => $request->next_stage,
            'next_date' => $request->initial_date,
        ]);

        toastr()->success('Case created successfully');

        return redirect()->route('case.list');
       
    }


    public function edit($id){
        $courts = Court::where('user_id', auth()->user()->id)->get();
        $case = CaseList::where('id', $id)->where('user_id', auth()->user()->id)->first();

        return view('pages.cases.edit', compact('case', 'courts'));
    }


    public function update(Request $request, $id){

        CaseList::where('id', $id)->update([
            'court_id' => $request->court_id,
            'case_no' => $request->case_no,
            'plaintiff' => $request->plaintiff,
            'defendant' => $request->defendant,
            'our_position' => $request->our_position,
            'contact' => $request->contact,
            'comment' => $request->comment,
        ]);

        toastr()->success('Case updated successfully');

        return redirect()->route('case.list');
        
    }


    public function delete($id){

        CaseList::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        toastr()->success('Case deleted successfully');
        return redirect()->route('case.list');
    }




    public function caseDetails($id){

        $caseDetails = CaseDate::where('case_id', $id)
        ->where('user_id', auth()->user()->id)
        ->with('case')
        ->get();
        
        return view('pages.cases.details', compact('caseDetails'));
    }
}
