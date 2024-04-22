<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(10)->create();
        
        DB::table('posts')->insert([
            'title' => 'titre',
            'description' => 'abc',
            'content' => 'test',
            'user_id' =>User::all()->random()->id
        ]);
    }
}
