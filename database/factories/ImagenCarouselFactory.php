<?php

namespace Database\Factories;

use App\Models\Carousel;
use App\Models\ImagenCarousel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImagenCarouselFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImagenCarousel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Logo'=> $this->faker->imageUrl(2000, 1520, null, true), 
            'Sinopsis'=>$this->faker->text(200), 
            'ImagenWeb'=>$this->faker->imageUrl(1440, 509, null, true),
            'ImagenMovil'=>$this->faker->imageUrl(2000, 1520, null, true),
            'Tipo'=>$this->faker->randomElement(['Serie', 'Pelicula', 'OVA']),  
            'Year'=> $this->faker->year('+10 years'), 
            'Subtitulado'=> $this->faker->randomElement(['Si', 'No']), 
            'Doblado'=> $this->faker->randomElement(['Si', 'No']), 
            'Titulo'=>$this->faker->text(15), 
            'carousel_id'=>1
        ];
    }
}
