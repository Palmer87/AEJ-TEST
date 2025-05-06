<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->string('plan_affaires')->nullable();
        });
    }

    public function down()
    {
        Schema::table('projets', function (Blueprint $table) {
            $table->dropColumn('plan_affaires');
        });
    }

};
