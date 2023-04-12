<?php

namespace App\Http\Controllers;

use App\Models\journal;
use App\Models\Unite;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
{
    // validate the form data
    $validatedData = $request->validate([
        'selectUnite.*' => 'required|integer',
        'selectproduit.*' => 'required|integer',
        'Production.*' => 'required|numeric',
        'Vent.*' => 'required|numeric',
        'Production_Vendue.*' => 'required|numeric',
    ]);

    // loop through the form data and create Journal models
    foreach ($validatedData['selectUnite'] as $key => $value) {
        $journal = new Journal();
        $journal->id_unite = $validatedData['selectUnite'][$key];
        $journal->id_produit = $validatedData['selectproduit'][$key];
        $journal->Production = $validatedData['Production'][$key];
        $journal->Vent = $validatedData['Vent'][$key];
        $journal->Production_Vendue = $validatedData['Production_Vendue'][$key];
        $journal->save();
    }

    // redirect to a success page
    return redirect()->back()->with('success', 'Journal entries added successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $journals = Journal::all();

    // Pass the journals data to the view for display
    return view('home', ['journals' => $journals]);
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
