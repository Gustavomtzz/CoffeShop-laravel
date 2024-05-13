<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            'nombre' => 'Café Caramel con Chocolate',
            'precio' => 59.9,
            'imagen' => 'cafe_01.jpg',
            'categoria_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Café Frio con Chocolate Grande',
            'precio' => 49.9,
            'imagen' => 'cafe_02.jpg',
            'categoria_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Paquete de 3 donas de Chocolate',
            'precio' => 49.9,
            'imagen' => 'donas_01.jpg',
            'categoria_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Paquete de 3 donas Glaseadas',
            'precio' => 39.9,
            'imagen' => 'donas_02.jpg',
            'categoria_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Paquete Galletas de Chocolate y Avena',
            'precio' => 39.9,
            'imagen' => 'galletas_02.jpg',
            'categoria_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Paquete de Muffins de Vainilla',
            'precio' => 59.9,
            'imagen' => 'galletas_03.jpg',
            'categoria_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Hamburguesa Cuarto de Libra',
            'precio' => 49.9,
            'imagen' => 'hamburguesas_05.jpg',
            'categoria_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Hamburguesa de Pollo',
            'precio' => 59.9,
            'imagen' => 'hamburguesas_02.jpg',
            'categoria_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Croissants De la casa',
            'precio' => 29.9,
            'imagen' => 'pastel_03.jpg',
            'categoria_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Waffle Especial',
            'precio' => 59.9,
            'imagen' => 'pastel_02.jpg',
            'categoria_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pizza Especial de la Casa',
            'precio' => 79.9,
            'imagen' => 'pizzas_04.jpg',
            'categoria_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Pizza Tocino',
            'precio' => 69.9,
            'imagen' => 'pizzas_07.jpg',
            'categoria_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
