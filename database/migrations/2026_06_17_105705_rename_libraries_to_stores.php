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
        Schema::rename('libraries', 'stores');

        Schema::table('games', function (Blueprint $table) {
            $table->renameColumn('library_id', 'store_id');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('store_type')->default('Physical');
            $table->boolean('is_active')->default(true);
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['store_type', 'is_active', 'phone_number']);
        });

        Schema::table('games', function (Blueprint $table) {
            $table->renameColumn('store_id', 'library_id');
        });

        Schema::rename('stores', 'libraries');
    }
};
