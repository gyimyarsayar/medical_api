<?php

namespace App\Http\Controllers\Api;

use App\Drug;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drugs = Drug::all();
        foreach ($drugs as $drug)
        {
            $drug['sideeffects'] = $drug->sideeffects;
        }
        return ['message' => 'Successful', 'data' => $drugs];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drug = Drug::create($request->all());
        $sideeffects = $request->sideeffects;
        foreach ($sideeffects as $sideeffect)
        {
            $drug->sideeffects()->attach($sideeffect);
        }
        $treatments = $request->treatments;
        foreach ($treatments as $treatment)
        {
            $drug->treatments()->attach($treatment);
        }
        return ['message' => 'Add Successful', 'data' => $drug ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }
}
