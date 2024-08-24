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
        Schema::create('users', function (Blueprint $table) {

            $table->id(); // Con il metodo id() io sto definendo una colonna che contiene numeri autoincrementali senza segno

            $table->string('name'); // Con il metodo string() sto definendo  una colonna contenente un dato di tipo string con un massimo di 255 caratteri, con 'name' definisco il nome della colonna

            $table->string('email')->unique(); //il metodo unique() definisce che ogni record deve avere queesto campo con un valore univoco

            $table->timestamp('email_verified_at')->nullable();// timestamp crea due colonne che identificano la data di creazione e la data di aggiornamento della riga
            // il metodo nullable peermette alla colonna di avere come dato valido il NULL

            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
