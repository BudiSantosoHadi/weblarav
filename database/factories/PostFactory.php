<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,8)),
            'slug' => $this->faker->slug(),
            'excerpt' =>$this->faker->paragraph(),
            // 'body' =>'<p>'.implode('</p><p>',$this->faker->paragraphs(mt_rand(5,10))) . '</p>',
            //templet
            'body' => collect ($this->faker->paragraphs(mt_rand(5,10)))
                   ->map(fn($p) => "<p>$p</p>")
                   ->implode(''), //arrow funtion
                   // jadi setiap paraghrap di bungkus dengan tag p
            'user_id' => mt_rand(1,3),
            'category_id'=> mt_rand(1,2)
        ];
    }
}
