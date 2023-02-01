<?php

namespace App\Http\Controllers;

use App\Models\compras;
use App\Models\facturas;
use App\Models\productos;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    public function add_compra(Request $request)
    {
         try {
            foreach ($request->producto as $producto) {
                $compras = new compras();
                $compras->productos_id = $producto;
                $compras->cliente_id = Auth::id();
                $compras->status = 0;
                $compras->save();  
            }
           
            $resp = 'Success';
         } catch (\Throwable $th) {
           
            $resp = 'Error';
         }// Validate the request...
         $productos = productos::all_productos();
         return view('welcome',compact('resp','productos'));
        
    }
}
