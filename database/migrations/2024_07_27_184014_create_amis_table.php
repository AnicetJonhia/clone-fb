<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmisTable extends Migration
{
    public function up()
    {
        Schema::create('amis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMembre1');
            $table->unsignedBigInteger('idMembre2');
            $table->timestamp('DateHeureDemande')->nullable();
            $table->timestamp('DateHeureAcceptation')->nullable();
            $table->foreign('idMembre1')->references('idMembre')->on('membres')->onDelete('cascade');
            $table->foreign('idMembre2')->references('idMembre')->on('membres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('amis');
    }
}
