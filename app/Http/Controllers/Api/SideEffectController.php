<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SideEffect;
use Illuminate\Http\Request;

class SideEffectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sideeffects = SideEffect::all();
        foreach ($sideeffects as $sideeffect)
        {
            $sideeffect['drugs'] = $sideeffect->drugs;
        }
        return ['message' => 'Successful', 'data' => $sideeffects];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sideeffect = SideEffect::create($request->all());
        $drugs = $request->drugs;
        foreach ($drugs as $drug)
        {
            $sideeffect->drugs()->attach($drug);
        }
        return ['Add Success' => 'Add Successful', 'data' => $sideeffect];

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
