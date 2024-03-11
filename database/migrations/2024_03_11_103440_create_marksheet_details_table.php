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
        Schema::create('marksheet_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('marksheet_id');
            $table->string('subject_name');
            $table->float('full_marks');
            $table->float('pass_marks');
            $table->float('marks_obtained');
            $table->string('remarks');
            $table->foreign('marksheet_id')->references('id')->on('marksheets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marksheet_details');
    }
};
