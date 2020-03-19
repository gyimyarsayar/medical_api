<?php

namespace App\Http\Controllers\Api;

use App\Expertise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expertises = Expertise::all();
        foreach ($expertises as $expertise)
        {
            $expertise[ 'doctors' ] = $expertise->doctors;
        }
        return [ 'message' => 'Successful', 'data' => $expertises ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $expertise = Expertise::create($request->all());
        $doctors = $request->doctors;
        foreach($doctors as $doctor)
        {
            $expertise->doctors()->attach($doctor);
        }

        return [ 'message' => 'Add Successfuly', 'data' => $expertise ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Expertise $expertise)
    {
        $doctors = $expertise->doctors;
        foreach ($doctors as $doctor)
        {
            $expertise[ 'doctors' ] = $doctor->doctors;
        }

        return ['message' => 'Successful', 'data' => $expertise];
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
