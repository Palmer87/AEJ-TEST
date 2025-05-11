<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promoteur_id');
            $table->string('titre');
            $table->string('type_projet');
            $table->string('forme_juridique');
            $table->string('plan_affaires')->nullable();
            $table->enum('status', ['en attente', 'validé', 'rejeté'])->default('en attente');
            $table->timestamps();
            $table->foreign('promoteur_id')->references('id')->on('promoteurs')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
