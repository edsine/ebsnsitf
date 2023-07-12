<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDtaReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dta_reviews', function (Blueprint $table) {
            $table->id('id');
            $table->integer('dta_reviewid');
            
            $table->foreignId('dta_id')->nullable()->constrained('dta_requests')->onDelete('cascade');
            $table->foreignId('officer_id')->nullable()->constrained('departments')->onDelete('cascade');
        

            $table->string('comments')->nullable();
            $table->integer('review_status')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->integer('status')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dta_reviews');
    }
}
