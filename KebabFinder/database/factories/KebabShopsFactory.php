<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\KebabShops;
use App\Models\User;

class KebabShopsFactory extends Factory
{
    protected $model = KebabShops::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       // User::whereHas("roles", function($q){ $q->where("name", "kebabines administratorius"); })->get()->random()->id;
        return [
           // 'user_id' => $this->faker->numberBetween(1, 10),
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "kebabines administratorius"); })->get()->random()->id,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'phone' => $this->faker->phoneNumber,
            'is_open' => $this->faker->boolean,
            'open_time' => $this->faker->time,
            'close_time' => $this->faker->time,
            'image' => $this->faker->imageUrl,
        ];
    }
}
