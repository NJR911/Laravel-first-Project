<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Health',
            'Business',
            'Gaming',
            'Education',
            'Science',
            'Sports',
            'Entertainment',
            'Lifestyle',
            'Travel',
            'Food & Drink',
            'Politics',
            'Environment',
            'Art & Design',
            'Relationship',
            'History',
            'Music',
            'Personal Finance',
            'Psychology',
            'Philosophy',
            'Love',
            'Cinema',
            'Literature',
            'DIY',
            'Space',
            'Football'
        ];

        foreach ($categories as $category) {
            Category::create(['category' => $category]);
        }
    }
}
