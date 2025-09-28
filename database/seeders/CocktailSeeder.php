<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Seeder;

class CocktailSeeder extends Seeder
{
    public function run(): void
    {
        Cocktail::factory()->count(10)->create();
    }
}
