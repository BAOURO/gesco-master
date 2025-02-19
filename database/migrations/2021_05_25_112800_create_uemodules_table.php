<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUemodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uemodules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unite_id')->constrained();
            $table->foreignId('module_id')->constrained();
            $table->foreignId('annee_id')->constrained();
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
        Schema::dropIfExists('uemodules');
    }
}
