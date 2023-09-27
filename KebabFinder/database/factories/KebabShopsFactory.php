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

        $kebab = [
            ["Pas Ibo", "55.69964656422088", "21.391067504882812"],
            ["Pas Ibo", "55.71937583528782", "21.392440795898438"],
            ["Bistro", "54.70181258694938", "25.2520751953125"],
            ["Bistro", "54.72739589737842", "25.209503173828125"],
            ["Bistro", "54.659535037041586", "25.279541015625004"],
            ["Jammi", "55.71608831526879", "21.133918762207035"],
            ["Jammi", "55.688423515539995", "21.155204772949222"],
            ["Giga", "54.911356424188476", "23.873291015625"],
            ["Giga", "54.846571357032325", "23.851318359375004"],
            ["Giga", "54.85131525968609", "23.955688476562504"],
        ];

        $kebab_nr = fake()->numberBetween(0, count($kebab) - 1);
       // User::whereHas("roles", function($q){ $q->where("name", "kebabines administratorius"); })->get()->random()->id;
        return [
           // 'user_id' => $this->faker->numberBetween(1, 10),
            'user_id' => User::whereHas("roles", function($q){ $q->where("name", "kebabines administratorius"); })->get()->random()->id,
            'name' => $kebab[$kebab_nr][0],
            // 'name' => $this->faker->name,
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'latitude' => $kebab[$kebab_nr][1],
            // 'latitude' => $this->faker->latitude,
            'longitude' => $kebab[$kebab_nr][2],
            // 'longitude' => $this->faker->longitude,
            'phone' => $this->faker->phoneNumber,
            'is_open' => $this->faker->boolean,
            'open_time' => $this->faker->time,
            'close_time' => $this->faker->time,
            'image' => $this->faker->imageUrl,
        ];
    }
}
