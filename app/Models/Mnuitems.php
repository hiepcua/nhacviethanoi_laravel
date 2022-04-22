<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Mnuitems extends Model
{
    use HasFactory;

    protected $table = 'tbl_mnuitems';

    public function getFirst(){
        return DB::table($this->table)->get()->first();
    }

    public function getByMenuId($menuId=null){
        $orderBy = 'order';
        $orderType = 'ASC';

        $menuitems = DB::table($this->table)
        ->where('isactive', 1)
        ->where('menu_id', $menuId)
        ->orderBy($orderBy, $orderType)
        ->get();

        return $menuitems;
    }
}
