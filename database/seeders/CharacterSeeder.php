<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseUrl = env('APP_URL');

        $characters = [
            [
                'name' => 'dino',
                'image_url' => $baseUrl.'/admin/images/dino.png',
                'shadow_color' => '#5A9DFF',
                'created_at' => now(),
            ],
            [
                'name' => 'kettie',
                'image_url' => $baseUrl.'/admin/images/kettie.png',
                'shadow_color' => '#FFAD40',
                'created_at' => now(),
            ],
            [
                'name' => 'dolly',
                'image_url' => $baseUrl.'/admin/images/dolly.png',
                'shadow_color' => '#F83E5D',
                'created_at' => now(),
            ],
            [
                'name' => 'king',
                'image_url' => $baseUrl.'/admin/images/king.png',
                'shadow_color' => '#FFFFFF',
                'created_at' => now(),
            ],
            [
                'name' => 'marvel',
                'image_url' => $baseUrl.'/admin/images/marvel.png',
                'shadow_color' => '#FFCD00',
                'created_at' => now(),
            ],
            [
                'name' => 'slophie',
                'image_url' => $baseUrl.'/admin/images/slophie.png',
                'shadow_color' => '#2BC647',
                'created_at' => now(),
            ],
            [
                'name' => 'henny',
                'image_url' => $baseUrl.'/admin/images/henny.png',
                'shadow_color' => '#EA984E',
                'created_at' => now(),
            ],
        ];

        foreach ($characters as $characterData) {
            Character::create($characterData);
        }
    }
}
