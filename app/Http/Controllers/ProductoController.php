<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Producto;
use App\Models\Divisa;

class ProductoController extends Controller
{
    public function listProduct() //listar todos los productos
    {
        $producto = Producto::get();
        return response()->json($producto);
    }

    public function listProductid($id) //obtener un productos
    {
        $producto = Producto::where('productos.id', $id)->get();
        return response()->json($producto);
    }

    public function store(Request $request){  //crear producto
        try {
            return Producto::create($request);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function update($id, Request $request){ //actualizar producto
        try {
            return Producto::updateproduct($id, $request);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
    public function delete($id){
        try {
            $producto = Producto::find($id); // Eliminar producto
            $producto->delete();
            return "sussefull";
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
    public function pricexproduct($id){ //listado de precio de un producto
        try {
            $producto = Producto::leftJoin('precios_productos', 'productos.id', '=', 'precios_productos.product_id')
            ->leftJoin('divisas', 'divisas.id', 'precios_productos.currency_id')
            ->where('productos.id', $id)->get();
            return response()->json($producto);
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function add_price_product($id, Request $request){ //añadir nuevo precio al producto
        try {
            Divisa::saveprices($id, $request);
            return response()->json("sussefull");
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
