<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = productos::all_productos();
        return view('index_productos',compact('productos'));
    }
    public function create()
    {
         return view('formulario_producto');
    }
    public function update($id)
    {
        $productos = productos::prod_by_id($id);
         return view('formulario_producto',compact('productos'));
    }
    public function delete($id)
    {
        $prod = productos::find($id);
        $prod->estatus = 0;
        $prod->save();
        $productos = productos::all_productos();
        return view('index_productos',compact('productos'));
    }
    public function save_producto(Request $request)
    {
         try {
            if (!empty($request->id)) {
                $prod = productos::find($request->id);
                $prod->nombre = $request->nombre;
                $prod->precio = $request->precio;
                $prod->impuesto = $request->impuesto;
                $prod->save();
            }else{

                $prod = new productos();
                $prod->nombre = $request->nombre;
                $prod->precio = $request->precio;
                $prod->impuesto = $request->impuesto;
                $prod->save();  
            }
           
            $resp = 'Success';
         } catch (\Throwable $th) {
           
            $resp = 'Error';
         }// Validate the request...
        $productos = productos::all_productos();
        return view('index_productos',compact('productos'));
        
    }
}
