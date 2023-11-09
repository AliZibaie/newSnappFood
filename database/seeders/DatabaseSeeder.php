<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RestaurantCategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            FoodCategorySeeder::class,
            RestaurantCategorySeeder::class,
            AddressSeeder::class,
            RestaurantSeeder::class,
        ]);
    }
}
