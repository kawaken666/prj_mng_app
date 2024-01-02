<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'project_name' => 'dSMS認証装着',
            'estimation' => 350,
            'release_date' => '20240129',
            'work_date' => '20231201',
        ];

        DB::table('projects')->insert($param);
    }
}
