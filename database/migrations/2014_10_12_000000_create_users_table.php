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
            $table->string('name', 191)->nullable();
            $table->string('email', 191)->unique()->nullable();
            $table->string('password', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->integer('code')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->boolean('status')->default(1);
            $table->unsignedInteger('coins')->default(0);
            $table->longtext('profile_image_url')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
