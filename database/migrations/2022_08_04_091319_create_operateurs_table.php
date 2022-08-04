<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operateurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('region_id')->constrained('region');
            $table->foreignId('type_op_id')->constrained('type_op');
            $table->string('nom_op', 100)->nullable();
            $table->string('cin_op', 12)->nullable();
            $table->string('adresse_op', 255)->nullable();
            $table->string('ref_op', 100)->nullable();
            $table->string('nom_president_voi', 100)->nullable();
            $table->date('valide_du')->nullable();
            $table->date('valide_au')->nullable();
            $table->string('titre_terrain', 100)->nullable();
            $table->string('nif', 100)->nullable();
            $table->string('stat')->nullable();
            $table->string('num_recepisse')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("operateurs", function(Blueprint $table){
            $table->dropConstrainedForeignId("region_id");
            $table->dropConstrainedForeignId("type_op_id");
        });
        Schema::dropIfExists('operateurs');
    }
}
