<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectMemberDetailSeeder extends Seeder
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
                'project_detail_id' => 1,
                'result_man_hour' => 4,
                'overview' => 'オンスケ。会員登録機能の結合仕様書作成中',
                'user_id' => 1
            ],
            [
                'project_detail_id' => 1,
                'result_man_hour' => 8,
                'overview' => 'オンスケ。会員情報変更機能の結合仕様書作成中',
                'user_id' => 2
            ]
        ];

        DB::table('project_member_details')->insert($param);
    }
}
