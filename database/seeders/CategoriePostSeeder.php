<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class CategoriePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sélectionnez quelques catégories et quelques posts
        $categories = Category::all();
        $posts = Post::all();

        // Attachez chaque post à une ou plusieurs catégories
        foreach ($posts as $post) {
            $randomCategories = $categories->random(rand(1, 3)); // Vous pouvez ajuster le nombre de catégories par post ici
            $post->categories()->attach($randomCategories);
        }
    }
}
