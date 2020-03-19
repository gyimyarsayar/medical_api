<?php

namespace App\Http\Controllers\Api;

use App\Doctor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        foreach ($doctors as $doctor)
        {
            $doctor[ 'expertises' ] = $doctor->expertises;
            $doctor['user'] = $doctor->user;
        }

        return [ 'message' => 'Successful', 'data' => $doctors ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Doctor::create($request->all());
        $expertises = $request->expertises;
        foreach($expertises as $expertise)
        {
            $doctor->expertises()->attach($expertise);
        }
        return [ 'message' => 'Add Successful', 'data' => $doctor ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $expertises = $doctor->expertises;
        foreach ($expertises as $expertise)
        {
            $doctor[ 'expertises' ] = $doctor->expertises;
            $doctor['user'] = $doctor->user;
        }
        return ['message' => 'successful', 'data' => $doctor];
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
