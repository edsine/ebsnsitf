<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LeaveRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_request', function (Blueprint $table) {
            $table->id(); 
         
             $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
             $table->foreignId('staff_id')->nullable()->constrained('staff')->onDelete('cascade');
            $table->unsignedBigInteger('leavetype_id')->nullable();
            $table->foreign('leavetype_id')->references('id')->on('leavetype')->onDelete('cascade');
           //  $table->string('reasons')->nullable();
                     
             $table->dateTime('date_start_new')->nullable();
             $table->string('type')->nullable();
             $table->integer('number_days')->nullable();
             $table->longText('home_address')->nullable();
             $table->longText('home_number')->nullable();
            //  $table->string('street_number')->nullable();
            //  $table->string('district')->nullable();
             $table->string('local_council')->nullable();
             $table->string('state')->nullable();
             $table->string('phone_number')->nullable();
             $table->string('officer_relieve')->nullable();
             $table->string('signature_path')->nullable();
             $table->dateTime('end_date')->nullable();
             $table->integer('approve_status')->nullable()->default(0);
             $table->integer('supervisor_office')->nullable()->default(0);
             $table->integer('md_hr')->nullable()->default(0);
             $table->integer('leave_officer')->nullable()->default(0);
             $table->integer('daystaken')->nullable();
        
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
        Schema::dropIfExists('leave_requests');
    }
}
