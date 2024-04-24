<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\DynamicPricing;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyAddOns;
use App\Models\PropertyPolicy;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'example',
            'email' => 'test@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',//password
        ]);


        $cities = collect([]);
        $ci = ['bangazy', 'triboli', 'sabha', 'misrath'];

        $cities = $cities->times(4)->map(function () use ($ci) {
            return Location::factory()->create([
                'name' => array_shift($ci)
            ]);
        });
        $properties = Property::factory(20)->create([
            'location_id' => function () use ($cities) {
                return $cities->random()->id;
            },

        ]);

        foreach ($properties as $property) {
            //making 3 review for each property
            Review::factory(3)->create([
                'property_id' => $property->id,
                'user_id' => User::factory()->create(),
            ]);
            //making 2 or 4 categories for each property
//            $property->categories()->sync($cities->shuffle()->take(3));
            DynamicPricing::factory()->create([
                'property_id' => $property->id,
            ]);
            PropertyPolicy::factory(4)->create([
                'property_id' => $property->id,
            ]);
            PropertyAddOns::factory(5)->create([
                'property_id' => $property->id,
            ]);
        }

        $categories = ['Free WiFi','Parking','Smoking','Room service','Family rooms','Air conditioning','Laundry','City view','Heating','Smart TV'];
        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category,
            ]);
        }
    }
}
