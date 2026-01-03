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
        Schema::create('proizvodni_proces', function (Blueprint $table) {
            $table->id();
            $table->string('serijski_broj', 50)->unique();
            $table->string('proizvod_id');
            $table->integer('kolicina_proizvoda');
            $table->date('datum_pocetka');
            $table->date('datum_zavrsetka')->nullable();
            $table->enum('status', ["planiran","u_toku","zavrsen","otkazan"])->default('planiran');
            $table->text('napomena')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proizvodni_proces');
    }
};
