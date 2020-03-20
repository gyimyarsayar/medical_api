<?php

namespace App\Http\Controllers\Api;

use App\Disease;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::all();
        foreach ($diseases as $disease)
        {
            $disease[ 'symptoms' ] = $disease->symptoms;
        }
        return ['message' => 'Successful', 'data' => $diseases];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disease = Disease::create($request->all());
        $symptoms = $request->symptoms;
        foreach ($symptoms as $symptom)
        {
            $disease->symptoms()->attach($symptom);
        }
        return ['message' => 'Add Successful', 'data' => $disease];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease)
    {
        $disease['symptoms'] = $disease->symptoms;

        return ['message' => 'Successful', 'data' => $disease];
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
        //
    }
}
