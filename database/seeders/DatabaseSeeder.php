<?php

namespace Database\Seeders;

use App\Models\Carousel;
use App\Models\Genero;
use App\Models\ImagenCarousel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genero::factory(20)->create();
        Carousel::factory(1)->create();
        ImagenCarousel::factory(3)->create();
    }
}
