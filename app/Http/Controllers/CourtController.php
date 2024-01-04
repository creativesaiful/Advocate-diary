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
                'court_name' => 'required | unique:courts',
            ]);

            Court::create([
                'court_name' => $request->court_name,
                'judge_name' => $request->judge_name,
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
        $courts = Court::all();

        return response()->json($courts);
    }


    public function edit($id) {

        $court = Court::find($id);


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

        $court = Court::find($id);

        $court->delete();

        return response()->json([
            'message' => 'Court deleted successfully',
            'status' => 200
        ]);

    }

   


}
