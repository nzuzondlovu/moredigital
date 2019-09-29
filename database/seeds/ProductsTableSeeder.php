<?php

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
        	'name' => Str::random(10),
        	'sku' => rand(1000000,9999999),
        	'description' => Str::random(255),
        	'price' => rand(10, 1000),
        	'file' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MU9M2_AV2?wid=1144&hei=1144&fmt=jpeg&qlt=80&op_usm=0.5,0.5&.v=1566855245932',
        	'views' => rand(10, 1000),
        ]);
    }
}
