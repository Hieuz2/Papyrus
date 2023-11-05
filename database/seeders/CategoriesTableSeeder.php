<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Birthday']);
        Category::create(['name' => 'thanksgiving']);
        Category::create(['name' => 'halloween']);
        Category::create(['name' => 'Anniversary']);
        Category::create(['name' => 'New Year']);
        Category::create(['name' => 'Mother’s Day']);
    }
}
