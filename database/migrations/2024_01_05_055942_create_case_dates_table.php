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
        Schema::create('case_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('case_id')->references('id')->on('case_lists')->onDelete('cascade');
            $table->date('initial_date')->nullable();
            $table->date('next_date')->nullable();
            $table->string('short_order')->nullable();

            $table->string('next_stage')->nullable();
            $table->string('comment')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_dates');
    }
};
