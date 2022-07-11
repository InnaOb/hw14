<?php

namespace Database\Factories;

use App\Models\Add;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Add>
 */
class AddFactory extends Factory
{
    protected $model = Add::class;

    public function definition()
    {
        $title = $this->faker->sentence(rand(3,6), true);

        return [
            'title' => $title,
            'description' => $this->faker->text(500),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
