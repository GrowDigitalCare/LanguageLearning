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
        if(!Schema::hasTable('tests')){
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('languageid');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->time('time_dur');
            $table->integer('total_mcq');
            $table->integer('total_marks');
            $table->integer('pass_marks');
            $table->enum('level', ['beginner', 'intermediate', 'expert']);
            $table->timestamps();

            $table->foreign('languageid')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
