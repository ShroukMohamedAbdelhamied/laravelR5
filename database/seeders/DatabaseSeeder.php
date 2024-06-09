<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\City;
use App\Models\Client;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(20)->create();
        City::factory()->count(20)->create();
        Client::factory()->count(20)->create();
    }
}
