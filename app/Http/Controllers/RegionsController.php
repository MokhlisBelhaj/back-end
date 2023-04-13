<?php

namespace App\Http\Controllers;

use App\Models\regions;
use App\Http\Requests\StoreregionsRequest;
use App\Http\Requests\UpdateregionsRequest;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = regions::all();
        return response()->json($regions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreregionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(regions $regions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(regions $regions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateregionsRequest $request, regions $regions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(regions $regions)
    {
        //
    }
}
