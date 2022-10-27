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
        Schema::create('pengelola_orders', function (Blueprint $table) {
            $table->id();
            $table->string('no_order');
            $table->foreignId('user_id');
            $table->foreignId('tour_place_id');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('total_payment');
            $table->enum('status', ['pending', 'selesai', 'gagal']);
            $table->string('image_tf')->default('nota.jpg');
            $table->string('image_tf_public_id')->nullable();
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
        Schema::dropIfExists('pengelola_orders');
    }
};
