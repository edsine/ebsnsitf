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
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employer_id')->unsigned();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->text('date_of_birth');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('email');
            $table->string('employment_date');
            $table->string('address');
            $table->string('local_govt_area');
            $table->string('state_of_origin');
            $table->string('phone_number');
            $table->string('means_of_identification');
            $table->string('identity_number');
            $table->string('identity_issue_date');
            $table->string('identity_expiry_date');
            $table->string('next_of_kin');
            $table->string('next_of_kin_phone');
            $table->string('monthly_renumeration');
            $table->string('status');
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
        Schema::drop('employees');
    }
};
