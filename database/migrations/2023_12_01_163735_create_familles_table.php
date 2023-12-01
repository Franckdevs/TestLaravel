<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   
       // Exemple
public function up()
{
    Schema::create('familles', function (Blueprint $table) {
        $table->id();
        $table->string('type');
        $table->string('nom');
        $table->string('numero')->unique();
        $table->unsignedBigInteger('cars_id');
        $table->timestamps();

        // Ajoutez d'autres colonnes si nécessaire
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familles');
    }
};
