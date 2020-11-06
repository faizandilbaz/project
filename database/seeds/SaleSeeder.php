<?php

use App\Sales;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        for ($i=1; $i < 400; $i++) { 
            Sales::create([
                'amount' =>  random_int(1,10000),
                'qty' => random_int(1,10),
                'sale_type' =>  'cash',
                'type' =>   'paid',
                'created_at'=> Carbon::create('2020', '10', random_int(1,31)),

            ]);     
    }
    }
}
