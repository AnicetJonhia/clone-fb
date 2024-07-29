<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id('idCommentaires');
            $table->unsignedBigInteger('idPublication');
            $table->unsignedBigInteger('idMembre');
            $table->timestamp('DateHeureCommentaires');
            $table->text('TexteCommentaire');
            $table->foreign('idPublication')->references('idPublication')->on('publications')->onDelete('cascade');
            $table->foreign('idMembre')->references('idMembre')->on('membres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}
