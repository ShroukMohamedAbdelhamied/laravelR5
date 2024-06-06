<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use Illuminate\Support\Facades\Log;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Log::info('Starting Client seeding...');

        try {
            Client::factory()->count(10)->create();
            Log::info('Client seeding completed successfully.');
        } catch (\Exception $e) {
            Log::error('Error seeding clients: ' . $e->getMessage());
        }
    }
}
