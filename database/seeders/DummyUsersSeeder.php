<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class DummyUsersSeeder extends Seeder
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
                'name'=>'Marjoko',
                'email'=>'marjoko@gmail.com',
                'rule'=>'1',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'customer',
                'email'=>'customer@gmail.com',
                'rule'=>'1',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'Tyas Sugiharta',
                'email'=>'tyassugiharta@gmail.com',
                'rule'=>'2',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'seller',
                'email'=>'seller@gmail.com',
                'rule'=>'2',
                'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }

    }
}
