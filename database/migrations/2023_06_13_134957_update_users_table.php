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
        Schema::table('users', function($table) {
            $table->unsignedBigInteger('roles')->after('remember_token')->nullable();
            $table->string('first_name')->after('name')->nullable();
            $table->string('middle_name')->after('name')->nullable();
            $table->string('last_name')->after('name')->nullable();
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
        Schema::table('users', function($table) {
            $table->dropColumn('roles');
        });
    }
};
