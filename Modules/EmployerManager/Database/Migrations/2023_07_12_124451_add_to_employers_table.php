<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->renameColumn('contact_person', 'contact_position');
            $table->string('cac_reg_year')->nullable()->change();
            $table->string('contact_surname');
            $table->string('contact_firstname');
            $table->string('contact_middlename')->nullable();
            $table->string('company_phone');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->integer('contribution_id')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            
        });
    }
}
