<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('first_name', 40)->nullable();
            $table->char('second_name', 40)->nullable();
            $table->float('form', 8, 2)->nullable();
            $table->integer('total_points')->nullable();
            $table->float('influence', 8, 2)->nullable();
            $table->float('creativity', 8, 2)->nullable();
            $table->float('threat', 8, 2)->nullable();
            $table->float('ict_index', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
