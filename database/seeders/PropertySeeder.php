<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'title' => 'Luxury Villa',
            'description' => 'Spacious 4-bedroom villa with ocean view.',
            'location' => 'Los Angeles',
            'price' => 1500000.00,
            'type' => 'House',
            'agent_id' => 1,
        ]);
    }
}

