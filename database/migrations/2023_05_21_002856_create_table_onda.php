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
        Schema::create('onda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surfista')->unsigned();
            $table->integer('bateria')->unsigned();
            $table->timestamps();

            $table->foreign('surfista')->references('numero')->on('surfista');
            $table->foreign('bateria')->references('id')->on('bateria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('onda', function (Blueprint $table) {
            $table->dropForeign(['surfista']);
            $table->dropForeign(['bateria']);
        });

        Schema::dropIfExists('onda');
    }
};
