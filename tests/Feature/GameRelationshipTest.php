<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\Store;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_game_can_have_multiple_stores()
    {
        $game = Game::factory()->create();
        $stores = Store::factory()->count(3)->create();

        $game->stores()->attach($stores);

        $this->assertEquals(3, $game->stores()->count());
    }

    public function test_a_store_can_have_multiple_games()
    {
        $store = Store::factory()->create();
        $games = Game::factory()->count(3)->create();

        $store->games()->attach($games);

        $this->assertEquals(3, $store->games()->count());
    }

    public function test_authenticated_user_can_create_game_with_multiple_stores()
    {
        $user = User::factory()->create();
        $stores = Store::factory()->count(2)->create();

        $response = $this->actingAs($user)
            ->withoutMiddleware()
            ->post(route('games.store'), [
            'name' => 'Multi-Store Game',
            'developer' => 'Test Dev',
            'genre' => 'RPG',
            'playtime' => 100,
            'release_date' => '2026-06-17',
            'stores' => $stores->pluck('id')->toArray(),
        ]);

        $response->assertRedirect(route('games.index'));
        
        $game = Game::where('name', 'Multi-Store Game')->first();
        $this->assertNotNull($game);
        $this->assertEquals(2, $game->stores()->count());
    }
}
