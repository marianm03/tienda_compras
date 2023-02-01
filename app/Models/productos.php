<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    public static function all_productos()
    {
       return productos::orderBy('nombre')->where('estatus',1)->get();
    }

    public static function prod_by_id($id)
    {
       return productos::where('id',$id)->first();
    }
}
