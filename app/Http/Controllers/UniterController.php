<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Unite;
use Illuminate\Http\Request;

class UniterController extends Controller
{
  
  public function index()
  {
    $unite = Unite::all();
    return view('unite.index', ['unite' => $unite]);
    
  }
  public function uniteIndex()
  {
    $unite = Unite::all();

    return view('home', compact('unite'));
  }
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  { {
      return View(
        'unite.create',
        [
          'produit' => Produit::all(),

        ]
      );
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $unite = new Unite;
    $unite->name = $request->name_unite;
    $unite->position = $request->poidtion_unite;
    $unite->save();
    
    

    // Ajouter les produits sélectionnés à l'unité
    foreach ($request->selectproduit as $produit_id) {
      $unite->Produit()->attach($produit_id);
    }

    return redirect()->route('unite.index')->with('success', 'Unité créée avec succès');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $produit = Produit::all();
    $unite = Unite::find($id); // find the unite with the given id or throw a 404 error if it is not found
    return view('unite.show', [
        'unite' => $unite,
        'produit' => $produit
    ]);
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
