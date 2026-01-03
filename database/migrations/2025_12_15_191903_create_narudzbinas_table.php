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
        Schema::create('narudzbinas', function (Blueprint $table) {
            $table->id();
            $table->string('broj_narudzbine', 50)->unique();
            $table->string('ime_kupca', 100);
            $table->string('email', 100);
            $table->text('adresa');
            $table->string('telefon', 20);
            $table->decimal('ukupna_cena', 10, 2)->default(0.00);
            $table->enum('status', ["kreirana","potvrdjena","u_obradi","poslata","dostavljena"])->default('kreirana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('narudzbinas');
    }
};
