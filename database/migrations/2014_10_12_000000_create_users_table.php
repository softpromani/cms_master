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
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique();
            $table->string('aphone')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('country')->default('1');
            $table->unsignedBigInteger('state')->default('1');
            $table->unsignedBigInteger('city')->default('1');
            $table->bigInteger('pincode')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
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
