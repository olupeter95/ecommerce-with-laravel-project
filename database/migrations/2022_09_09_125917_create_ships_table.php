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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->string('shipping_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->integer('postal_code');
            $table->text('notes');
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
        Schema::dropIfExists('ships');
    }
};
