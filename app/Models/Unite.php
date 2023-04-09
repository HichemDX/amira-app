<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
  use HasFactory;

  protected $table = "unites";
  protected $fillable = ['name','Position'];
  protected $hidden = ['created_at', 'updated_at', 'pivot'];

  public function produit()
  {
    return $this->belongsToMany('App\Models\Produit', table: 'unite_produit', foreignPivotKey: 'unite_id', relatedPivotKey: 'produit_id');
  }
}
