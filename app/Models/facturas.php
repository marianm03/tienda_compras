<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $fillable = [
        'total_factura',
        'total_impuesto',
    ];

    public static function all_facturas()
    {
       return facturas::orderBy('id')->get();
    }
    public static function factura_all($id)
    {
       return facturas::where('facturas.id',$id)
            ->leftjoin('compra_facturas','facturas.id','compra_facturas.factura')
            ->leftjoin('compras','compra_facturas.compra','compras.id')
            ->leftjoin('productos','compras.productos_id','productos.id')
            ->leftjoin('users','compras.cliente_id','users.id')
            ->orderBy('compras.created_at')
            ->get();
    }
    
}
