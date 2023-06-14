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
        Schema::create('departments', function($table) {
            $table->bigIncrements('id');
            $table->string('dep_unit');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
           
        });

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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onDelete('cascade');
            $table->integer('dash_type');
            $table->string('gender');
            $table->string('staff_id');
            $table->string('region');
            $table->string('phone');
            $table->string('profile_picture');
            $table->string('status');
            $table->string('alternative_email');
            $table->string('created_by');
            $table->string('date_approved');
            $table->string('approved_by');
            $table->string('security_key');
            $table->string('date_modified');
            $table->text('modified_by');
            $table->text('office_position');
            $table->text('position');
            $table->text('about_me');
            $table->string('total_received_email');
            $table->string('total_sent_email');
            $table->string('total_draft_email');
            $table->string('total_event');
            $table->text('my_groups');
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
        //
    }
};
