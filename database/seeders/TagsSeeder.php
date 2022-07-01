<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run()
    {
        Tag::create(['name' => 'Best buy']);
        Tag::create(['name' => 'Bestseller']);
        Tag::create(['name' => 'Nuova offerta']);
        Tag::create(['name' => 'Offerta in scadenza']);
        Tag::create(['name' => 'Out of stock']);
        Tag::create(['name' => 'Prodotto in esaurimento scorte']);
    }
}
