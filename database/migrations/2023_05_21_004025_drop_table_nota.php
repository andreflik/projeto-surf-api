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
        Schema::dropIfExists('nota');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('nota', function ($table) {
            $table->increments('id');
            $table->integer('onda')->unsigned();
            $table->decimal('nota1', 5, 2);
            $table->decimal('nota2', 5, 2);
            $table->decimal('nota3', 5, 2);
            $table->timestamps();

            $table->foreign('onda')->references('id')->on('onda');
        });
    }
};
