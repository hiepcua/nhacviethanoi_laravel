<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Content extends Model
{
    use HasFactory;

    protected $table = 'tbl_content';

    public function getHot(){
        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->where('ishot', 1)
        ->orderBy('cdate', 'DESC')
        ->offset(0)
        ->limit(4)
        ->get();

        return $data;
    }
}
