<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product_type extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_type';

    public function getAll(){
        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->get();

        return $data;
    }
}
