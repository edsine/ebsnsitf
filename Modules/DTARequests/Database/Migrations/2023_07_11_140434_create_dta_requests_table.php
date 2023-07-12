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
            $table->integer('dta_id');
            $table->integer('staff_id');
            
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('cascade');

            $table->string('purpose_travel')->nullable();
            $table->string('destination')->nullable();
            $table->bigInteger('number_days')->nullable();
            $table->dateTime('travel_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('estimated_expenses')->nullable();
            $table->integer('supervisor_status')->nullable();
            $table->integer('hod_status')->nullable();
            $table->integer('md_status')->nullable();
            $table->integer('account_status')->nullable();
            $table->integer('approval_status')->nullable();
            $table->integer('status')->nullable();
            $table->integer('uploaded_doc')->nullable();
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
