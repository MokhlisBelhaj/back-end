<?php

namespace App\Http\Controllers;

use App\Models\salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salles = Salle::all();
        return response()->json($salles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'region_id' => 'required'
        ]);

        $salle = Salle::create([
            'name' => $validatedData['name'],
            'image' =>$validatedData['image'] ,
            'region_id' =>$validatedData['region_id'],
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'C:\Users\YC\Desktop\TheaMaroc\TheaMaroc-1\src\assets\img\salle';
            $filename = $image->getClientOriginalName();
            $image->move($path, $filename);
            $salle->image =$filename;
            $salle->save();
        }

        return response()->json([
            'message' => 'Resource created successfully',
            'data' => $salle
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salle=salle::where('region_id',$id)->get();
        return response()->json(['salle' => $salle]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(salle $salle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salle $salle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $salle = Salle::find($id);
        $salle->delete();
        return response()->json([
            'message' => 'Salle deleted successfully']);
    }
}
