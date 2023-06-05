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
        Schema::create('job_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id')->nullable(false)->index();
            $table->integer('worker_id')->nullable(false)->index();
            $table->date('date_start')->nullable(false);
            $table->date('date_end')->nullable(false);
            $table->time('time_start')->nullable(false);
            $table->time('time_end')->nullable(false);
            $table->string('payement_type')->nullable(false);
            $table->integer('budget')->nullable(false);
            $table->boolean('accept')->default(false);
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
