<?php

namespace App\Http\Controllers;

use App\Models\bibliotheque;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bibliotheque = bibliotheque::all();
        return response()->json($bibliotheque);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> 'required|string|max:255',
            'description'=>'nullable|string',
            'image' => 'required',
            'link'=>'required|string|max:255',
        ]);

        $bibliotheque = Bibliotheque::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image'=>$validatedData['image'],
            'link'=>$validatedData['link']
        ]);

        return response()->json([
            'message' => 'Resource created successfully',
            'data' => $bibliotheque
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
    public function show(bibliotheque $bibliotheque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bibliotheque $bibliotheque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bibliotheque $bibliotheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bibliotheque = Bibliotheque::findOrFail($id);
    $bibliotheque->delete();

    return response()->json([
        'message' => 'Resource deleted successfully'
    ], 200);
    }
}
