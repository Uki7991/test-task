<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'title' => 'Уилмингтон (Северная Каролина)',
                'timezone' => 'America/New_York'
            ],
            [
                'title' => 'Портленд (Орегон)',
                'timezone' => 'America/New_York'
            ],
            [
                'title' => 'Торонто',
                'timezone' => 'America/Toronto',
            ],
            [
                'title' => 'Варшава',
                'timezone' => 'Europe/Warsaw',
            ],
            [
                'title' => 'Валенсия',
                'timezone' => 'Europe/Madrid',
            ],
            [
                'title' => 'Шанхай',
                'timezone' => 'Asia/Shanghai',
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
