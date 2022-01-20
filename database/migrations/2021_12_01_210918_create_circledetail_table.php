<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircledetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circledetail', function (Blueprint $table) {
            $table->unsignedBigInteger('circle_id');
            $table->foreign('circle_id')
                ->references('id')
                ->on('circles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circledetail');
    }
}
