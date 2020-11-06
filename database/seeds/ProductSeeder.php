<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 40; $i++) { 
            Product::create([
                'category_id' =>  random_int(1,10),
                'name' => 'product' .$i,
                'barcode' =>  random_int(4540,75575),
                'price' =>  random_int(20,280),
                'qty' =>  random_int(1,4),
                'status' => 'active'
                


            ]);     
    }
}
}