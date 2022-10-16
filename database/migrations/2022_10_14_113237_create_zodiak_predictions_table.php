<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zodiak_predictions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zodiak')->references('id')->on('zodiaks');
            $table->foreignId('prediction');
            $table->date('dates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zodiak_predictions');
    }
};
