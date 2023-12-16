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
        Schema::create('project_member_details', function (Blueprint $table) {
            $table->id('project_member_detail_id');
            $table->unsignedBigInteger('project_detail_id');
            $table->foreign('project_detail_id')->references('project_detail_id')->on('project_details');
            $table->integer('result_man_hour');
            $table->string('overview');
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('projrct_member_details');
    }
};
