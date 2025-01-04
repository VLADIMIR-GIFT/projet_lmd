<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('e_c_s', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nom');
            $table->integer('coefficient');
            $table->string('enseignant');
            $table->foreignId('ue_id')->constrained('u_e_s')->onDelete('cascade'); // Référence à 'ues' et non 'u_e_s'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_c_s'); // Assurez-vous que le nom ici est aussi 'e_c_s'
    }
};
