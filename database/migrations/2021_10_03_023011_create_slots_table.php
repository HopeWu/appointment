<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('start_at')->nullable()->default(Carbon::createFromTime(0,0));
            $table->time('end_at')->nullable()->default(Carbon::createFromTime(0,0));
            $table->string('duration')->nullable()->default(Carbon::createFromTime(0,0));
            $table->integer('price')->nullable()->default(20000);
            $table->string('currency')->nullable()->default('SEK');
            $table->boolean('is_valid')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
}
