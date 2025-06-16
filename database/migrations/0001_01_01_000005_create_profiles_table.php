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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('nickname')->nullable();
            $table->text('avatar')->nullable();
            $table->text('sub_avatar')->nullable();
            $table->text('bio')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('social')->nullable();
            $table->string('website')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('jobs')->nullable();
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->dateTimeTz('timezone')->nullable();
            $table->enum('notifications', ['on', 'off'])->default('on');
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
