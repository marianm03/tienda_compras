<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compras extends Model
{
    use HasFactory;
    protected $table = 'compras';
    protected $fillable = [
        'id',
        'productos_id',
        'cliente_id',
    ];

    

    public static function compras_sin_procesar()
    {
       return compras::select('compras.id','compras.cliente_id','productos.precio','productos.impuesto')->where('status',0)->orderBy('cliente_id', 'asc')->leftjoin('productos','productos.id','compras.productos_id')->get();
    }
}
