<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $product = Product::create(['name' => 'Prodotto 1', 'slug' => 'prodotto-1', 'price' => 2999]);
        $tags = \App\Models\Tag::all();
            $product->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );

        Product::create(['name' => 'Prodotto 2', 'slug' => 'prodotto-2', 'price' => 3999]);
        Product::create(['name' => 'Prodotto 3', 'slug' => 'prodotto-3', 'price' => 4999]);
        Product::create(['name' => 'Iphone 11',  'slug' => 'iphone-11',  'price' => 999 ]);
        Product::create(['name' => 'Iphone 12',  'slug' => 'iphone-12',  'price' => 1199]);
        Product::create(['name' => 'Iphone 13',  'slug' => 'iphone-13',  'price' => 1999]);
        Product::create(['name' => 'Galaxy S21', 'slug' => 'galaxy-s21', 'price' => 999 ]);
        Product::create(['name' => 'Galaxy S22', 'slug' => 'galaxy-s22', 'price' => 1999]);
    }
}
