<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->longText('uid');
            $table->longText('job_title');
            $table->string('job_category');
            $table->date('opening_date');
            $table->date('closing_date')->nullable();
            $table->string('location');
            $table->string('hourly_wage');
            $table->string('payment_frequency');
            $table->bigInteger('job_type');
            $table->string('work_days');
            $table->string('work_hours');
            $table->string('qualifications');
            $table->longText('job_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
