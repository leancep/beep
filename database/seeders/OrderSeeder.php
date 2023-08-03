<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrdersLine;
use Illuminate\Database\Seeder;
use Faker\Generator;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = app(Generator::class);

        for ($i = 0; $i < 20; $i++) { 
            Order::create([
               'order_ref' => $faker->word,
               'customer_name' => $faker->name
            ]);
        }

        for ($i = 0; $i < 100; $i++) { 
            OrdersLine::create([
               'order_id' => rand(1, 20),
               'qty' => rand(1,15),
               'product_id' => rand(1,10),
            ]);
        }

    }
}
