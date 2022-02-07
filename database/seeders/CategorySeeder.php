<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Acting School'],
            ['name' => 'Digital Marketing'],
            ['name' => 'Filming School'],
            ['name' => 'Cryptocurrency'],
        ];

        Category::insert($categories);
    }
}
