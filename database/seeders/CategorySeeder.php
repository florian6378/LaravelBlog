<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;





class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       Category::factory(7)->create();
    }

}
?>