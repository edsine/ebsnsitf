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
        Schema::create('branches', function (Blueprint $table) {
            $table->id('id');
            $table->string('branch_name')->unique();
            $table->integer('branch_region');
            $table->string('branch_code')->unique();
            $table->string('last_ecsnumber')->unique();
            $table->integer('highest_rank');
            $table->integer('staff_strength');
            $table->integer('managing_id');
            $table->string('branch_email')->unique();
            $table->string('branch_phone')->unique();
            $table->string('branch_address');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');
    }
};
