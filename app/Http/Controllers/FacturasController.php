<?php

namespace App\Http\Controllers;

use App\Models\compra_factura;
use App\Models\compras;
use App\Models\facturas;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function store(Request $request)
    {
        try {
            $total_precio =0;
            $total_impuesto =0;

            $id = 0;
            $idFactura = 0;

            $compras = compras::compras_sin_procesar();
            foreach ($compras as $compra) {
                if ($id != $compra->cliente_id) {
                    $factura = new facturas();
                    $factura->total_factura = 0;
                    $factura->total_impuesto = 0;
                    $factura->save();  
                    $idFactura = $factura->id;
                    $total_impuesto= 0;
                    $total_precio = 0;

                }
                $impuesto = ($compra->precio * $compra->impuesto) / 100;
                $precio = $compra->precio + $impuesto;
                $total_precio+= $precio;
                $total_impuesto+= $impuesto;
                
                $comp_x_fac = new compra_factura();
                $comp_x_fac->factura = $idFactura;
                $comp_x_fac->compra = $compra->id;
                $comp_x_fac->save();  
                        
                if (!empty($idFactura)) {
                    $factura_update = facturas::find( $idFactura);
                    $factura_update->total_factura = $total_precio;
                    $factura_update->total_impuesto = $total_impuesto;
                    $factura_update->save();
                }

                
                $comp = compras::find($compra->id);
                $comp->status = 1;
                $comp->save();

                $id = $compra->cliente_id;

            }
            
            $resp = 'Success';
        } catch (\Throwable $th) {
           
            $resp = 'No Data';
        }
        $facturas_e = facturas::all_facturas();

        return view('dashboard',compact('resp','facturas_e'));
        
    }
    public function ver_factura($id)
    {
        $factura = facturas::factura_all($id);
        return view('index_facturas',compact('factura'));
    }
}
