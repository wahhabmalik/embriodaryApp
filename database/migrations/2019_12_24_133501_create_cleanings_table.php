<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleanings', function (Blueprint $table) {
            $table->bigIncrements('cleaning_id');
            $table->string('ps_po');
            $table->string('box');
            $table->string('date');
            $table->string('item');
            $table->string('description');
            $table->string('quantity');
            $table->string('cleaned_by');
            $table->string('date_complete');
            $table->string('box');
            $table->string('polybag');
            $table->string('notes');
            $table->string('damage_notes');
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
        Schema::dropIfExists('cleanings');
    }
}
