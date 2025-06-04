<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{




     public function up(): void
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
            $table->foreignId('gestionnaire_id')->constrained('gestionnaires'); // si les admins sont dans la table users
            $table->text('message');
            $table->enum('status', ['en_attente', 'corrigé'])->default('en_attente');
            $table->timestamps();
        });

    }

    
    public function down(): void
    {
        Schema::dropIfExists('corrections');
    }
};
