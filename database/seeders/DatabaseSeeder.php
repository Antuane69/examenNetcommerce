<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Users;
use App\Models\Companies;
use App\Models\Tasks;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Users::create(["name" => "Akira"]);
        Users::create(["name" => "Antuane"]);

        Users::factory()->count(8)->create();

        Companies::factory()->count(5)->create();

        Tasks::factory()->count(5)->create();
    }
}
