<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id('idPublication');
            $table->unsignedBigInteger('idMembre');
            $table->timestamp('DateHeurePublication');
            $table->text('TextePublication');
            $table->enum('TypeAffichage', ['public', 'amis']);
            $table->foreign('idMembre')->references('idMembre')->on('membres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
