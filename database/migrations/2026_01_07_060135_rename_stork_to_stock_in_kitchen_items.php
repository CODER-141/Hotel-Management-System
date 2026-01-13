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
        DB::statement("ALTER TABLE kitchen_items CHANGE now_stork now_stock INT NOT NULL");
        DB::statement("ALTER TABLE kitchen_items CHANGE min_stork min_stock INT NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kitchen_items', function (Blueprint $table) {
            //
        });
    }
};
