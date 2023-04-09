<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view('Produit.index'
      ,[
        'produit' => Produit::all(),
        
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('produit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      {
        $produit = new Produit();
        $produit->name = $request->input('nameproduit');
        $produit->unite_id = $request->input('unite_id');
        $produit->save();
      return redirect()->route('produit.index');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $produit = Produit::findOrFail($id);

      // Retourner la vue de détails du produit avec les données récupérées
      return view('produit.show', compact('produit'));
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
