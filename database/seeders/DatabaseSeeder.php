<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@localhost.com',
            'password' => Hash::make('123456'),
            'status' => 2
        ]);

        DB::table('brands')->insert([
            'name' => 'Adidas'
        ]);

        DB::table('brands')->insert([
            'name' => 'Sketchy'
        ]);

        DB::table('products')->insert([
            'brand_id' => 2,
            'name' => 'Áo thun Sketchy De Basic',
            'slug' => 'ao-thun-sketchy-de-basic',
            'price' => 200000,
            'description' => 'Áo thun trơn cổ tròn (Áo phông) GILDAN Hammer:
                            - Thương hiệu: Gildan
                            - Xuất xứ: Bangladesh (Hàng nhập khẩu)
                            - Chất liệu vải: 100% cotton USA',
            'image'      => 'sketchy_de_basic.jpg',
            'path'       => 'uploads/products/1/',
            'code'       => 'SK_01'
        ]);

        DB::table('products')->insert([
            'brand_id' => 2,
            'name' => 'Áo thun Sketchy Fu**all',
            'slug' => 'ao-thun-sketchy-fu-all',
            'price' => 220000,
            'description' => 'Áo thun trơn cổ tròn (Áo phông) GILDAN Hammer:
                            - Thương hiệu: Gildan
                            - Xuất xứ: Bangladesh (Hàng nhập khẩu)
                            - Chất liệu vải: 100% cotton USA',
            'image'      => 'sketchy_fuyall.jpg',
            'path'       => 'uploads/products/2/',
            'code'       => 'SK_01'
        ]);
    }
}
