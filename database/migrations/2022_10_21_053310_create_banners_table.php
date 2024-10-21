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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('detail_en')->nullable();
            $table->string('title_kh')->nullable();
            $table->string('detail_kh')->nullable();
            $table->string('image');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('banner_type_id')->unsigned();
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
        Schema::dropIfExists('banners');
    }
};
