<?php
use App\Models\Tag;
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
        // CREAZIONE TABELLA
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        $tags = ['Attualità', 'Musica', 'E-sports', 'Cronaca', 'Satira', 'Scientifico', 'Trend', 'Formazione', 'Motori'];

        // POPOLAZIONE TABELLA
        foreach ($tags as $tag){
            //MASS ASSIGNMENT
            Tag::create(['name'=> $tag]);
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
