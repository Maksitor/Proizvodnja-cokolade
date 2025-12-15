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
        Schema::create('sirovinas', function (Blueprint $table) {
            $table->id();
            $table->string('naziv', 255);
            $table->decimal('kolicina_na_stanju', 10, 2)->default(0.00);
            $table->string('jedinica_mere', 10);
            $table->decimal('min_kolicina', 10, 2)->default(10.00);
            $table->decimal('cena_po_jedinici', 10, 2)->default(0.00);
            $table->enum('status', ["dostupno","nedostupno","kriticno"])->default('dostupno');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sirovinas');
    }
};
