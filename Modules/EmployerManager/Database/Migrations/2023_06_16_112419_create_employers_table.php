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
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('ecs_number');
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_address');
            $table->string('company_rcnumber');
            $table->integer('cac_reg_year');
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('company_localgovt');
            $table->string('company_state');
            $table->integer('number_of_employees');
            $table->string('business_area');
            $table->string('inspection_status');
            $table->string('status');
            $table->string('registered_date');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
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
        Schema::drop('employers');
    }
};
