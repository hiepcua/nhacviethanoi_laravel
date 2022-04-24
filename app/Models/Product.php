<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_product';

    public function getAll(){
        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->orderBy('cdate', 'DESC')
        ->get();

        return $data;
    }

    public function getProductSale($offset=null, $limit=null){
        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->where('sale', 'yes')
        ->orderBy('price1', 'DESC');
        
        if(isset($offset) && isset($limit)){
            $data = $data->offset($offset)->limit($limit);
        }

        $data = $data->get();

        return $data;
    }
}
