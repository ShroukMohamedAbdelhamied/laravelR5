<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\City;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(20)->create([
            'expired' => 0,
        ]);
        City::factory()->count(20)->create();
        Client::factory()->count(20)->create();
    }
}
