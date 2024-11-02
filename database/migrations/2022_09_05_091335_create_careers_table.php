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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title_en');
            $table->string('title_kh');
            $table->string('business_unit_en')->nullable();
            $table->string('business_unit_kh')->nullable();
            $table->string('location_en');
            $table->string('location_kh');
            $table->longText('description_en');
            $table->longText('description_kh');
            $table->string('logo');
            $table->enum('job_nature', ['Full Time', 'Part Time', 'Internship'])->default('Full Time');
            $table->date('date_start');
            $table->date('date_end');
            $table->softDeletes();
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
        Schema::dropIfExists('careers');
    }
};
