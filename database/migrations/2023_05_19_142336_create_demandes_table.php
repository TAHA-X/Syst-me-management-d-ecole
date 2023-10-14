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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_etudiant");
            $table->unsignedBigInteger("id_certificat");
            $table->enum("status",[1,2,3]); // 1 => encours , 2 => accepté , 3 => refusé
            $table->foreign("id_etudiant")->references("id")->on("users")->cascadeOnDelete();
            $table->foreign("id_certificat")->references("id")->on("certificats")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
