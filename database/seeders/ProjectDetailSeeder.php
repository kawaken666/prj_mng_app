<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'project_id' => 1,
            'status' => 0,
            'overview' => '現在、結合テスト仕様書の作成と実施を並行実施中。仕様書作成にてバグが4件発生、バグチケット起票済み。どれも軽微なバグであるため、追加工数やスケジュール変更は無しでリカバリ可能の見込み。',
            'date' => '20231217'
        ];

        DB::table('project_details')->insert($param);
    }
}
