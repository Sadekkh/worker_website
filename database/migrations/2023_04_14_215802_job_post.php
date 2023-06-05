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
        Schema::create('job_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable(false)->index();
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->date('date_start')->nullable(false);
            $table->date('date_end')->nullable(false);
            $table->time('time_start')->nullable(false);
            $table->time('time_end')->nullable(false);
            $table->string('payement_type')->nullable(false);
            $table->integer('budget')->nullable(false);
            $table->integer('type')->nullable(true);
            $table->integer('tools')->nullable(true);
            $table->integer('place')->nullable(true);
            $table->integer('worker_number')->nullable(true);
            $table->boolean('state')->default(true);
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
