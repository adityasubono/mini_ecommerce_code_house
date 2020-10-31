<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DummyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name'=>'Sayur Segar'
            ],
            [
                'name'=>'Daging Segar'
            ],
            [
                'name'=>'Ikan Segar'
            ],
            [
                'name'=>'Buah Segar'
            ],
        ];

        foreach ($userData as $key => $val) {
            Category::create($val);
        }

    }
}
