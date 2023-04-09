<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Unite;
use Illuminate\Http\Request;

class UniterController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return View('unite.index', [
      'unite' => Unite::all(),

    ]);
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
  {     $unite = new Unite;
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
    $unite = Unite::find($id); // récupère l'unité avec l'ID correspondant ou renvoie une erreur 404 si elle n'est pas trouvée
    return view('unite.show', compact('unite'));
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
