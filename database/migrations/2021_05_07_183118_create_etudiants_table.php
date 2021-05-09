<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->nullable();
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->enum('sexe', ['Masculin', 'Feminin']);
            $table->integer('telephone')->nullable();
            $table->boolean('situation_mat')->default('0');
            $table->integer('profession')->nullable();
            $table->foreignId('pays_id')->constrained()->nullable();
            $table->foreignId('region_id')->constrained()->nullable();
            $table->foreignId('departement_id')->constrained()->nullable();
            $table->string('nom_pere')->nullable();
            $table->string('tel_pere')->nullable();
            $table->string('adresse_pere')->nullable();
            $table->string('profession_pere')->nullable();
            $table->string('residence_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('tel_mere')->nullable();
            $table->string('adresse_mere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('residence_mere')->nullable();
            $table->string('nom_tituaire')->nullable();
            $table->string('tel_tituaire')->nullable();
            $table->string('adresse_tituaire')->nullable();
            $table->string('profession_tituaire')->nullable();
            $table->string('residence_tituaire')->nullable();
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
        Schema::dropIfExists('etudiants');
    }
}
