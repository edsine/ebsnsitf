<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDtaRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dta_requests', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('images')->nullable();
            //$table->integer('branch_id')->nullable();
            //$table->integer('user_id')->nullable();
            $table->integer('regional_manager_status')->nullable();
            $table->integer('head_office_status')->nullable();
            $table->integer('medical_team_status')->nullable();
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('dta_requests');
    }
}
