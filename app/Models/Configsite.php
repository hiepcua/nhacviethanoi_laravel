<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Configsite extends Model
{
    use HasFactory;

    protected $table = 'tbl_configsite';

    public function get(){
        return DB::table($this->table)->get()->first();
    }
}
