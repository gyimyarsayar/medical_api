<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $symptoms = Symptom::all();
        foreach ($symptoms as $symptom)
        {
            $symptom['patients'] = $symptom->patients;
            $symptom['patients'] = $symptom->diseases;
        }
        //
        return ['message' => 'successful', 'data' =>$symptoms];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $symptom = Symptom::create($request->all());
        $patients = $request->patients;
        foreach ($patients as $patient)
        {
            $symptom->patients()->attach($patient);
        }
        $diseases = $request->diseases;
        foreach ($diseases as $disease)
        {
            $symptom->diseases()->attach($disease);
        }
        return ['message' => 'Add Successful', 'data' => $symptom];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Symptom $symptom)
    {
        $symptom['patients'] = $symptom->patients;
        $symptom['diseases'] = $symptom->diseases;

        return ['message' => 'Successful', 'data' => $symptom];
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
