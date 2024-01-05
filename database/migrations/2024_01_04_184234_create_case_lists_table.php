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
        Schema::create('case_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->unsignedBigInteger('court_id');
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');


            $table->string('case_no')->nullable();
            $table->string('plaintiff', 255);
            $table->string('defendant', 255);
            $table->string('our_position', 255)->comment('plaintiff, defendant');
            $table->string('contact', 11);
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_lists');
    }
};
