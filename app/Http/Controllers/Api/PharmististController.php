<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Pharmistist;
use Illuminate\Http\Request;

class PharmististController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmistists = Pharmistist::all();
        foreach ($pharmistists as $pharmistist)
        {
            $pharmistist['user'] = $pharmistist->user;
        }
        return ['message' => 'Successful', 'data' => $pharmistists];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pharmistist = Pharmistist::create($request->all());
        return ['message' => 'Add Successful', 'data' => $pharmistist];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pharmistist $pharmistist)
    {
        $pharmistist['user'] = $pharmistist->user;

        return ['message' => 'Successful', 'data' => $pharmistist];
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
