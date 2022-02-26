<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->float('weight', 6,2);
            $table->float('fat_percentage', 6, 2)->nullable();
            $table->float('muscle_weight', 6, 2)->nullable();
            $table->float('fat_weight', 6, 2)->nullable();
            $table->integer('calorie_intake')->nullable();
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
        Schema::dropIfExists('weights');
    }
}
