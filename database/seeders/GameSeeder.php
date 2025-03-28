<?php

namespace Database\Seeders;

use App\Models\Games;
use App\Models\Items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Games::insert([
            ['name' => 'Mobile Legends'],
            ['name' => 'Free Fire'],
            ['name' => 'PUBG Mobile'],
        ]);

        Items::insert([
            ['name' => '500 - Diamond Mobile Legends', 'games_id' => 1, 'price' => 100000],
            ['name' => '1000 - Diamond Mobile Legends', 'games_id' => 1, 'price' => 200000],
            ['name' => '2000 - Diamond Mobile Legends', 'games_id' => 1, 'price' => 400000],
            ['name' => '500 - Diamond Free Fire', 'games_id' => 2, 'price' => 100000],
            ['name' => '1000 - Diamond Free Fire', 'games_id' => 2, 'price' => 200000],
            ['name' => '2000 - Diamond Free Fire', 'games_id' => 2, 'price' => 400000],
            ['name' => '500 - UC PUBG Mobile', 'games_id' => 3, 'price' => 100000],
            ['name' => '1000 - UC PUBG Mobile', 'games_id' => 3, 'price' => 200000],
            ['name' => '2000 - UC PUBG Mobile', 'games_id' => 3, 'price' => 400000],
        ]);
    }
}
