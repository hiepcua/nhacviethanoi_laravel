<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product_group extends Model
{
    use HasFactory;

    protected $table = 'tbl_product_group';
    protected $table2 = 'tbl_product_type';

    public function getMenuProduct(){
        $arr = array();
        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->where('par_id', 0)
        ->orderBy('order', 'ASC')
        ->get();

        $arr = $data;

        foreach ($data as $key => $value) {
            $item = $this->getProTypeByProGroup($value->id);
            
            $arr[$key]->childs = $item;
        }

        return $data;
    }

    public function getProTypeByProGroup($id_pgroup=null){
        $data = DB::table($this->table2)
        ->where('isactive', 1)
        ->orderBy('order', 'ASC');

        if(!empty($id_pgroup)){
            $data = $data->where('id_pgroup', $id_pgroup);
        }

        $data = $data->get();

        return $data;
    }

    public function getAll(){
        $data = DB::table($this->table)
        ->where('isactive', 1)
        ->where('par_id', 0)
        ->orderBy('order', 'ASC')
        ->get();

        return $data;
    }
}
