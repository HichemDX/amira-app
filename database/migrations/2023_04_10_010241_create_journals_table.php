<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unite');
            $table->integer('id_produit');
            $table->integer('Production');
            $table->integer('Vent');
            $table->integer('Production_Vendue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
