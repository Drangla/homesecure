<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Flug', function (Blueprint $table) {
            $table->integer('Flugnummer')->primary();
            $table->string('Abflugplanet')->nullable();
            $table->string('Zielplanet')->nullable();
            $table->time('Abflugzeit')->nullable();
            $table->time('Ankunftszeit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Person');
    }
}
