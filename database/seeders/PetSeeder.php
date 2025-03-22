<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Seeder;
use App\Models\Pet;
use App\Models\PetType;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pet::factory()
            ->count(5)
            ->create();
    }
}
