<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string("appointment_no");
            $table->string('klarna_order_id')->nullable()->default("null");
            $table->date("date");
            $table->foreignId("which_slot");
            $table->string("start_end_time");
            $table->string('duration');

            $table->foreignId("custo'mer_id");

            $table->string("customer_name");
            $table->string("email");
            $table->string("address")->nullable()->default("");
            $table->string("tel")->nullable()->default("");

            $table->double("price", 12,4)->nullable();
            $table->decimal("discount", 4,2)->nullable();
            $table->double("charge", 12, 4)->nullable();
            $table->text("memo")->nullable();
            $table->text("notes")->nullable();
            $table->boolean("payment_status")->default(0);
            $table->string("payment_method")->nullable()->default("klarna");
            $table->string("validity")->nullable()->default(1);
            $table->string("consultant")->nullable()->default("mother");

            $table->foreign("customer_id")->references("id")->on("users");
            $table->foreign('which_slot')->references('id')->on('slots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
