<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile_number')->nullable();
            $table->string('emp_number')->nullable();
            $table->string('post')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('salary_date')->nullable();
            $table->string('image')->nullable();
            $table->integer('type')->default(0); // 0: User, 1: Admin, 2: Staff
            $table->integer('status')->default(1);
            $table->text('address')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('religion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
