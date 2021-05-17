<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Person', function (Blueprint $table) {
            $table->date('Geburtsdatum');
            $table->integer('SVNR', false);
            $table->string('Vorname')->nullable();
            $table->string('Nachname')->nullable();
            $table->integer('PLZ')->nullable();
            $table->string('Ort')->nullable();
            $table->string('Straße')->nullable();
            $table->string('Hausnr')->nullable();
            $table->primary(array('Geburtsdatum', 'SVNR'));
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
