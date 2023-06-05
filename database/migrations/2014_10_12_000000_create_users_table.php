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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('cin')->nullable(false)->unique();;
            $table->string('name')->nullable(false);
            $table->integer('mnumber')->nullable(false);
            $table->string('location')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('insurance')->nullable(true);
            $table->string('insur_type')->nullable(true);
            $table->string('transp_mat')->nullable(true);
            $table->integer('transp_place')->nullable(true);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
