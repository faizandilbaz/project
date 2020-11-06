<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) { 
            Category::create([
                'name' => 'Category' .$i,
                'color' => '#'.random_int(00000,11111)
                
            ]);            # code...
        }
    }
}
