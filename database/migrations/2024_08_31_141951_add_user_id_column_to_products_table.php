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
        Schema::table('products', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->nullable()->after('price'); //! Nome della colonna specificatamente così
            //Una colonna con all'interno un tipo di dato intero molto grande senza segno (solo numeri positivi)
            $table->foreign('user_id')->references('id')->on('users');// ? VINCOLO REFERENZIALE
            // Questi metodi definscono la foreignket della tabella products collegata alla tabella users tramite i loro id specifici
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropforeign(['user_id']);//!! Rompo il vincolo referenziale
            $table->dropColumn('user_id'); //? Sto eliminando la colonna creata
        });
    }
};
