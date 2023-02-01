<?php

namespace App\Http\Controllers;

use App\Models\facturas;
use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()['type_user'] == 2) {
            $productos = productos::all_productos();
            return view('welcome',compact('productos'));
        }else{
            $facturas_e = facturas::all_facturas();
            return view('dashboard',compact('facturas_e'));
        }
    }
}
