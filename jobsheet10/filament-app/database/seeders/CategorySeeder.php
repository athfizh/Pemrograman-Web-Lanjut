<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
            ],
            [
                'name' => 'Olahraga',
                'slug' => 'olahraga',
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
