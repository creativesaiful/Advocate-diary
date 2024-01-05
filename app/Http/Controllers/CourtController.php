<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Court;

class CourtController extends Controller
{
    /**
     * Display a listing of the courts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.courts.index');
    }

    /**
     * store a newly created court in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        try {
            $request->validate([
                'court_name' => 'required',
                'judge_name' => 'required',
            ]);
            //check existing court name for current user

            $existingCourt = Court::where('court_name', $request->court_name)->where('user_id', auth()->user()->id)->first();

            if($existingCourt) {
                return response()->json([
                    'message' => 'Court already exists',
                    'status' => 500
                ]);
            }




            Court::create([
                'court_name' => $request->court_name,
                'judge_name' => $request->judge_name,
                'user_id' => auth()->user()->id
            ]);

            return response()->json([
                'message' => 'Court created successfully',
                'status' => 200
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 500
            ]);
        }


        
    }


    /**
     *  Display a listing of the courts.
     * 
     *  @return \Illuminate\Http\Response
     */
    public function courtListAjax() {
        $courts = Court::where('user_id', auth()->user()->id)->get();

        return response()->json($courts);
    }


    public function edit($id) {

        $court = Court::where('user_id', auth()->user()->id)->find($id);


        return response()->json($court);

    }

    public function update(Request $request, $id) {

        try {

            $request->validate([
                'court_name' => 'required',
                'judge_name' => 'required',
            ]);

            $court = Court::find($id);

            $court->update([
                'court_name' => $request->court_name,
                'judge_name' => $request->judge_name,
            ]);

            return response()->json([
                'message' => 'Court updated successfully',
                'status' => 200
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => 500
            ]);
        }
        
            
        

    }



    public function delete($id) {

        $court = Court::where('user_id', auth()->user()->id)->find($id);;

        $court->delete();

        return response()->json([
            'message' => 'Court deleted successfully',
            'status' => 200
        ]);

    }

   


}
