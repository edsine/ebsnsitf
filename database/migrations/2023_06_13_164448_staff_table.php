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
        //
        // Schema::create('departments', function($table) {
        //     $table->bigIncrements('id');
        //     $table->string('department_unit')->nullable();
        //     $table->integer('status')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
           
        // });

        /* Schema::create('branches', function($table) {
            $table->bigIncrements('id');
            $table->string('branch_name');
            $table->string('branch_region');
            $table->string('branch_code');
            $table->string('last_ecsnumber');
            $table->string('highest_rank');
            $table->string('staff_strength');
            $table->string('managing_id');
            $table->string('branch_email');
            $table->string('branch_phone');
            $table->text('branch_address');
            $table->string('branch_manager');
            $table->timestamps();
           
        }); */

        Schema::create('staff', function($table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');
            $table->integer('dash_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('region')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->integer('status')->nullable();
            $table->string('alternative_email')->nullable();
            $table->string('created_by')->nullable();
            $table->string('date_approved')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('security_key')->nullable();
            $table->string('date_modified')->nullable();
            $table->text('modified_by')->nullable();
            $table->text('office_position')->nullable();
            $table->text('position')->nullable();
            $table->text('about_me')->nullable();
            $table->string('total_received_email')->nullable();
            $table->string('total_sent_email')->nullable();
            $table->string('total_draft_email')->nullable();
            $table->string('total_event')->nullable();
            $table->text('my_groups')->nullable();
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
        //
    }
};
