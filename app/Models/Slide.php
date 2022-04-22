<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'tbl_slider';

    public function getAll(){
        $orderBy = 'order';
        $orderType = 'ASC';

        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->orderBy($orderBy, $orderType)
        ->get();

        return $data;
    }
}
