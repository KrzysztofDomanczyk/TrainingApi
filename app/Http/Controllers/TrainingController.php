<?php

namespace App\Http\Controllers;


use App\Exercise;
use App\Http\Requests\StoreTraning;
use App\Training;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::with(['users'])->get();

        return response([
            'status' => "ok",
            'response' => $trainings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTraning $request)
    {
        $newTraining = Training::create($request->only(['title', 'coach_id']));
        
        foreach ($request->input('exercises') as $exercise)  {
            Exercise::create([
                'title' => $exercise, 
                "training_id" => $newTraining->id
                ]);
        }

        return response([
            'status' => 'ok',
            'response' => "Saved correctly"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $training = Training::find($id);
        
        if(Auth::user()->can('view', $training)){
            $response = [
                    'status' => "ok",
                    'response' => $training
            ];
        } else {
            return response ([
                'status' => "error",
                'response' => 'Exist users who boughts this training'
            ], 404);
        }

        return response($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
    
        if ($training->users->isEmpty()) {
            $training->delete();
            $response = [
                'status' => "ok",
                'response' => 'Resource deleted'
            ];
        } else {
            return response ([
                'status' => "error",
                'response' => 'Exist users who boughts this training'
            ], 404);
        }
        return response($response);
        
    }
}
