<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->text('img_item')->nullable();
            $table->string('name_item', 50);
            $table->unsignedBigInteger('wishlist_id');
            $table->foreign('wishlist_id')
                ->references('id')
                ->on('wishlist')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('adress_web')->nullable();
            $table->string('shop_name')->nullable();
            $table->boolean('switch')->default(false);
            $table->unsignedBigInteger('buyer_id')
                ->nullable();
            $table->foreign('buyer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('listdetail');
    }
}
