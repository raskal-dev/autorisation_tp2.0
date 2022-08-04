<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpperateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opperateurs', function (Blueprint $table) {
            $table->id();
            $table->string('region');
            $table->string('type_op', 100);
            $table->string('nom_op', 100);
            $table->sring('cin_op', 12);
            $table->string('adresse_op', 255);
            $table->string('ref_permis', 100);
            $table->date('valide_du');
            $table->date('valide_au');
            $table->string('nom_president_voi', 100);
            $table->string('titre_terrain', 100)->nullable();
            $table->string('nif', 100);
            $table->integer('stat', 20);
            $table->char('num_recipice', 50);
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
        Schema::dropIfExists('opperateurs');
    }
}
