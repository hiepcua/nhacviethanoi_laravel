<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'tbl_categories';

    public function get($par_id=null){
        $orderBy = 'order';
        $orderType = 'ASC';

        $data = DB::table($this->table)
        ->where('isactive', 1);

        if($par_id!=null){
            $data = $data->where('par_id', $par_id);
        }
        
        $data = $data->orderBy($orderBy, $orderType)
        ->get();

        return $data;
    }
}
