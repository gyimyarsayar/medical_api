<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        foreach ($patients as $patient)
        {
            $patient['symptoms'] = $patient->symptoms;
            $patient['user'] = $patient->user;
        }
        return ['message' => 'Success', 'data' => $patients];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        $symptoms = $request->symptoms;
        foreach ($symptoms as $symptom)
        {
            $patient->symptoms()->attach($symptom);
        }
        return ['message' => 'Add Successful', 'data' => $patient];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $symptoms = $patient->symptoms;
        foreach ( $symptoms as $symptom) {
            $patient['user'] = $patient->user;
            $patient['symptoms'] = $symptom->symptoms;
        }
        // dd($patient);
        return ['message' => 'Success', 'data' => $patient];
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
