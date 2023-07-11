<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DiscussionFactory extends Factory
{
    protected $model = Discussion::class;

    public function definition(): array
    {
        return [
            'user_id' => rand(1, 6),
            'title' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'topic_id' => rand(1, 3),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
