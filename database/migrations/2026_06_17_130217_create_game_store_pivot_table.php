<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('game_store');
        Schema::create('game_store', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('store_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // Copy existing data if any
        if (Schema::hasColumn('games', 'store_id')) {
            $games = DB::table('games')->whereNotNull('store_id')->get();
            foreach ($games as $game) {
                DB::table('game_store')->insert([
                    'game_id' => $game->id,
                    'store_id' => $game->store_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            Schema::table('games', function (Blueprint $table) {
                $table->dropForeign('games_library_id_foreign');
                $table->dropColumn('store_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->foreignId('store_id')->nullable()->constrained()->nullOnDelete();
        });

        // Restore data if any
        $pivotData = DB::table('game_store')->get();
        foreach ($pivotData as $data) {
            DB::table('games')->where('id', $data->game_id)->update(['store_id' => $data->store_id]);
        }

        Schema::dropIfExists('game_store');
    }
};
