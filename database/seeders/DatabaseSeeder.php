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
        User::factory(20)->create();
        City::factory(20)->create();
        Client::factory(20)->create();
    }
}
