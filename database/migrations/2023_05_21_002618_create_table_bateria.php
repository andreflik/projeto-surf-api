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

            Schema::create('bateria', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('surfista')->unsigned();
                $table->timestamps();
                $table->softDeletes()->nullable();

                $table->foreign('surfista')->references('numero')->on('surfista');
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bateria', function (Blueprint $table) {
            $table->dropForeign(['surfista']);
        });

        Schema::dropIfExists('bateria');
    }
};
