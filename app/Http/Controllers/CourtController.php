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



   


}
