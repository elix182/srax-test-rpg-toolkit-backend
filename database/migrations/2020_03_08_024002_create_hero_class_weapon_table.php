<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroClassWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_class_weapon', function (Blueprint $table) {
            $table->unsignedBigInteger('hero_class_id');
            $table->unsignedBigInteger('weapon_id');
            $table->foreign('hero_class_id')
              ->references('id')
              ->on('hero_classes');
            $table->foreign('weapon_id')
              ->references('id')
              ->on('weapons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hero_class_weapon');
    }
}
