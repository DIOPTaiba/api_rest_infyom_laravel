<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->integer('id_compte_source')->unsigned();
            $table->foreign('id_compte_source')->references('id')->on('comptes');
            $table->integer('id_compte_destinataire')->unsigned();
            $table->foreign('id_compte_destinataire')->references('id')->on('comptes');
            $table->string('type_operation');
            $table->integer('montant');
            $table->dateTime('date_operation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
