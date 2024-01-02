<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'name' => '川野健汰',
                'email' => 'test@test.com',
                'password' => '$2y$10$C.4BWdymqKru3w9OxZrDW.1XKJdEdFLcAWb3CBTvmMF5dIDjDo5S6', // password2
            ],
            [
                'name' => '田中太郎',
                'email' => 'test2@test.com',
                'password' => '$2y$10$C.4BWdymqKru3w9OxZrDW.1XKJdEdFLcAWb3CBTvmMF5dIDjDo5S6', // password2

            ]
        ];

        DB::table('users')->insert($param);
    }
}
