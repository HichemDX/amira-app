<?php

namespace App\Http\Controllers;

use App\Models\journal;
use App\Models\Produit;
use App\Models\Unite;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $unite = Unite::all();
      $produit = Produit::all();
      $journals = journal::all();


      return view('home', compact('unite','produit','journals'));
    }
}
