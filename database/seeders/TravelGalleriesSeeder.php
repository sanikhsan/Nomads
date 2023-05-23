<?php

namespace Database\Seeders;

use App\Models\PackageGalleries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelGalleriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'travel_packages_id' => '1',
                'image' => 'public/SeedingImage/Bratan/bratan1.jpg'
            ],
            [
                'travel_packages_id' => '2',
                'image' => 'public/SeedingImage/Nusa/nusa1.jpg'
            ],
            [
                'travel_packages_id' => '3',
                'image' => 'public/SeedingImage/Dubai/dubai1.jpg'
            ],
            [
                'travel_packages_id' => '4',
                'image' => 'public/SeedingImage/Bromo/bromo1.jpg'
            ],
            [
                'travel_packages_id' => '1',
                'image' => 'public/SeedingImage/Bratan/bratan2.jpg'
            ],
            [
                'travel_packages_id' => '1',
                'image' => 'public/SeedingImage/Bratan/bratan3.jpg'
            ],
            [
                'travel_packages_id' => '1',
                'image' => 'public/SeedingImage/Bratan/bratan4.jpg'
            ],
            [
                'travel_packages_id' => '1',
                'image' => 'public/SeedingImage/Bratan/bratan5.jpg'
            ],
            [
                'travel_packages_id' => '2',
                'image' => 'public/SeedingImage/Nusa/nusa2.jpg'
            ],
            [
                'travel_packages_id' => '2',
                'image' => 'public/SeedingImage/Nusa/nusa3.jpg'
            ],
            [
                'travel_packages_id' => '2',
                'image' => 'public/SeedingImage/Nusa/nusa4.jpg'
            ],
            [
                'travel_packages_id' => '2',
                'image' => 'public/SeedingImage/Nusa/nusa5.jpg'
            ],
            [
                'travel_packages_id' => '3',
                'image' => 'public/SeedingImage/Dubai/dubai2.jpg'
            ],
            [
                'travel_packages_id' => '3',
                'image' => 'public/SeedingImage/Dubai/dubai3.jpg'
            ],
            [
                'travel_packages_id' => '3',
                'image' => 'public/SeedingImage/Dubai/dubai4.jpg'
            ],
            [
                'travel_packages_id' => '3',
                'image' => 'public/SeedingImage/Dubai/dubai5.jpg'
            ],
            [
                'travel_packages_id' => '4',
                'image' => 'public/SeedingImage/Bromo/bromo2.jpg'
            ],
            [
                'travel_packages_id' => '4',
                'image' => 'public/SeedingImage/Bromo/bromo3.jpg'
            ],
            [
                'travel_packages_id' => '4',
                'image' => 'public/SeedingImage/Bromo/bromo4.jpg'
            ],
            [
                'travel_packages_id' => '4',
                'image' => 'public/SeedingImage/Bromo/bromo5.jpg'
            ]
        ];

        foreach ($galleries as $gallery) {
            PackageGalleries::create($gallery);
        }
    }
}
