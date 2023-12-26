<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;

    // 手動でモデルインスタンスを生成する場合のカラム操作許可のために必要
    protected $fillable = [
        'date',
        'status',
        'projectOverview',
        'name',
        'result_man_hour',
        'memberOverview'
    ]; 
}
