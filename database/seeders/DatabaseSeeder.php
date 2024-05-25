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

        Companies::create(["name" => "Netcommerce"]);
        Companies::create(["name" => "Netcommerce"]);
        Companies::create(["name" => "Netcommerce"]);

        Tasks::create(["company_id" => 1 ,"name" => "task1", "description" => "task content", "user_id" => 1]);
        Tasks::create(["company_id" => 1 ,"name" => "task2", "description" => "task content", "user_id" => 1]);

        Users::factory()->count(3)->create();

        Companies::factory()->count(2)->create();

        Tasks::factory()->count(5)->create();
    }
}
