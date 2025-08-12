<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array {
        return [
        'title' => fake()->sentence(3),
        'date'  => fake()->dateTimeBetween('now','+60 days')->format('Y-m-d'),
        'time'  => fake()->time('H:i'),
        'location' => fake()->city,
        'category' => fake()->randomElement(['Workshop','Seminar','Social','Training','Conference']),
        'description' => fake()->paragraph(),
        'image_path' => 'https://picsum.photos/seed/'.fake()->unique()->numberBetween(1,1000).'/600/400'
        ];
    }
}
