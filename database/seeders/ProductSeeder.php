<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = ['Lapiz', 'Boligrafo', 'Cuaderno', 'Agenda', 'Revista', 'Pintura Acrilica', 'Tijera', 'Postal', 'Borrador','Pizarra'];

        foreach($products as $product){
            Product::create(['name' => $product, 'cost' => rand(5,150)]);
        }
    }
}
