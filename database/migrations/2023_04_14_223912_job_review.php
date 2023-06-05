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
        Schema::create('jobReview', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id')->nullable(false)->index();
            $table->integer('empolyer_id')->nullable(false)->index();
            $table->integer('worker_id')->nullable(false)->index();
            $table->integer('review')->nullable(false);
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
