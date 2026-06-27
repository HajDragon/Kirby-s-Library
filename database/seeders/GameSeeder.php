<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Store;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = Store::firstOrCreate(
            ['name' => "Kirby's Dream Store"],
            [
                'city' => 'Dream Land',
                'address' => 'Planet Popstar',
                'store_type' => 'Physical',
                'is_active' => true,
                'phone_number' => '555-DREAM',
            ]
        );

        $fullGames = [
            [
                'name' => "Kirby's Dream Land",
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 1,
                'release_date' => '1992-08-01',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r76.jpg',
            ],
            [
                'name' => "Kirby's Adventure",
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 4,
                'release_date' => '1993-05-01',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r77.jpg',
            ],
            [
                'name' => "Kirby's Dream Land 2",
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 3,
                'release_date' => '1995-05-01',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r78.jpg',
            ],
            [
                'name' => 'Kirby Super Star',
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 4,
                'release_date' => '1996-09-20',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r79.jpg',
            ],
            [
                'name' => "Kirby's Dream Land 3",
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 4,
                'release_date' => '1997-11-27',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r7a.jpg',
            ],
            [
                'name' => 'Kirby 64: The Crystal Shards',
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 4,
                'release_date' => '2000-06-26',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1v7f.jpg',
            ],
            [
                'name' => 'Kirby & the Amazing Mirror',
                'developer' => 'HAL / Flagship',
                'genre' => 'Metroidvania',
                'playtime' => 7,
                'release_date' => '2004-10-18',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1v8f.jpg',
            ],
            [
                'name' => 'Kirby: Squeak Squad',
                'developer' => 'HAL / Flagship',
                'genre' => 'Platformer',
                'playtime' => 5,
                'release_date' => '2006-12-06',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r8g.jpg',
            ],
            [
                'name' => "Kirby's Return to Dream Land",
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 7,
                'release_date' => '2011-10-24',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co209m.jpg',
            ],
            [
                'name' => 'Kirby: Triple Deluxe',
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 7,
                'release_date' => '2014-05-02',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r88.jpg',
            ],
            [
                'name' => 'Kirby: Planet Robobot',
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 7,
                'release_date' => '2016-06-10',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r8h.jpg',
            ],
            [
                'name' => 'Kirby Star Allies',
                'developer' => 'HAL Laboratory',
                'genre' => 'Platformer',
                'playtime' => 6,
                'release_date' => '2018-03-16',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1p9c.jpg',
            ],
            [
                'name' => 'Kirby and the Forgotten Land',
                'developer' => 'HAL Laboratory',
                'genre' => '3D Platformer',
                'playtime' => 11,
                'release_date' => '2022-03-25',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co4997.jpg',
            ],
            [
                'name' => "Kirby's Air Ride",
                'developer' => 'HAL Laboratory',
                'genre' => 'Racing',
                'playtime' => 2,
                'release_date' => '2003-09-21',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r6t.jpg',
            ],
            [
                'name' => "Kirby's Epic Yarn",
                'developer' => 'Good-Feel / HAL',
                'genre' => 'Platformer',
                'playtime' => 8,
                'release_date' => '2010-10-17',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co200v.jpg',
            ],
            [
                'name' => 'Kirby Mass Attack',
                'developer' => 'HAL Laboratory',
                'genre' => 'Strategy/Action',
                'playtime' => 10,
                'release_date' => '2011-09-19',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co1r8v.jpg',
            ],
            [
                'name' => "Kirby's Dream Buffet",
                'developer' => 'HAL Laboratory',
                'genre' => 'Party/Racing',
                'playtime' => 2,
                'release_date' => '2022-08-17',
                'image_url' => 'https://images.igdb.com/igdb/image/upload/t_cover_big/co529v.jpg',
            ],
        ];

        foreach ($fullGames as $gameData) {
            $game = Game::create($gameData);
            $game->stores()->attach($store->id);
        }
    }
}
