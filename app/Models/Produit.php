<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
  use HasFactory;

  protected $table = "produits";
  protected $fillable = ['name'];
  protected $hidden = ['created_at', 'updated_at', 'pivot'];

  public function unite()
  {
    return $this->belongsToMany(unite::class, 'unite_produit', 'produit_id', 'unite_id');
  }
}
