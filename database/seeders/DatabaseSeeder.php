<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

      User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'type' => 'admin',
            'phone' => 678799265242,  // Fake 10-digit phone number
        ]);

        User::create([
            'name' => 'Kabita',
            'email' => 'kabita@gmail.com',
            'password' => Hash::make('password'),
            'phone' => 97865433567,  // Fake 10-digit phone number
        ]);

        User::create([
            'name' => 'Santosh',
            'email' => 'santosh@gmail.com',
            'password' => Hash::make('password'),
            'phone' => 11111111111,  // Fake 10-digit phone number
        ]);

        User::create([
            'name' => 'Puja',
            'email' => 'puja@gmail.com',
            'password' => Hash::make('password'),
            'phone' => 907643212672,  // Fake 10-digit phone number
        ]);

        User::create([
            'name' => 'Rama',
            'email' => 'rama@gmail.com',
            'password' => Hash::make('password'),
            'phone' => 156789028642,  // Fake 10-digit phone number
        ]);

        User::create([
            'name' => 'Kosis',
            'email' => 'kosis@gmail.com',
            'password' => Hash::make('password'),
            'phone' => 1265437890,  // Fake 10-digit phone number
        ]);

        User::create([
            'name' => 'Manoj',
            'email' => 'manoj@gmail.com',
            'password' => Hash::make('password'),
            'phone' => 1234567890,  // Fake 10-digit phone number
        ]);

       $services = [
            ['name' => 'Photography', 'description' => 'Professional photography services.', 'package' => 'Basic', 'price' => 300, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Video Editing', 'description' => 'High-quality video editing for all occasions.', 'package' => 'Standard', 'price' => 500, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Wedding Photography', 'description' => 'Capture your special day with us.', 'package' => 'Premium', 'price' => 800, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Product Photography', 'description' => 'Perfect shots for your product catalog.', 'package' => 'Basic', 'price' => 250, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Event Photography', 'description' => 'Capture memorable moments at your event.', 'package' => 'Standard', 'price' => 400, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Drone Photography', 'description' => 'Aerial shots for a different perspective.', 'package' => 'Premium', 'price' => 1000, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Editing & Retouching', 'description' => 'Enhance your images with professional editing.', 'package' => 'Basic', 'price' => 150, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Portrait Photography', 'description' => 'Personalized portraits for individuals and families.', 'package' => 'Standard', 'price' => 350, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Studio Photography', 'description' => 'Professional studio photography for products and models.', 'package' => 'Premium', 'price' => 600, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Real Estate Photography', 'description' => 'Showcase your property with stunning images.', 'package' => 'Standard', 'price' => 450, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Fashion Photography', 'description' => 'High-fashion photography for your brand.', 'package' => 'Basic', 'price' => 500, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Corporate Photography', 'description' => 'Professional photography for corporate events.', 'package' => 'Premium', 'price' => 750, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Food Photography', 'description' => 'Delicious images for your restaurant or food blog.', 'package' => 'Standard', 'price' => 400, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Pet Photography', 'description' => 'Capture your furry friends in beautiful shots.', 'package' => 'Basic', 'price' => 250, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Fitness Photography', 'description' => 'Showcase your fitness brand or personal journey.', 'package' => 'Standard', 'price' => 350, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Baby Photography', 'description' => 'Capture the precious moments of your little ones.', 'package' => 'Premium', 'price' => 600, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Boudoir Photography', 'description' => 'Elegant and intimate boudoir photography.', 'package' => 'Basic', 'price' => 450, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Music Video Production', 'description' => 'Create stunning music videos with professional production.', 'package' => 'Standard', 'price' => 1500, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Documentary Filming', 'description' => 'Capture compelling stories with professional documentary filming.', 'package' => 'Premium', 'price' => 2000, 'image' => 'https://via.placeholder.com/150'],
            ['name' => 'Travel Photography', 'description' => 'Photography services for your travel adventures.', 'package' => 'Basic', 'price' => 400, 'image' => 'https://via.placeholder.com/150'],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}