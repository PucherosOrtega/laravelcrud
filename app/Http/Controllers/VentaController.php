<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Vendedor;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        $productos = Producto::all();
        $vendedores = Vendedor::all();
        $clientes = Cliente::all();
        $ventas = Venta::with([
            'categoria' => function ($q) {  $q->select('idCategoria','nombreCategoria');},
            'vendedor' => function ($q) {  $q->select('idVendedor','nombreVendedor');},
            'producto' => function ($q) {  $q->select('idProducto','nombreProducto');},
            ])->get();
            
        $data = [
            'categorias'=>$categorias,   
            'ventas'=>$ventas,
            'vendedores'=>$vendedores,
            'clientes'=>$clientes,
            'productos'=>$productos
        ];
        return view('index', ['data'=>$data]);
    }

    public function create(request $request){
        $data = $request->validate([

        ]);
        $newVenta = Venta::create([
            "fechaVenta" => $request->dateInput,
            "cantidadVenta" => $request-> cantidadInput,
            "cantidadTotalVenta" => 100,
            "movimientoVenta" => $request-> movimientoInput,
            "idVendedorVenta_id" => $request->vendedorInput,
            "idCategoriaVenta_id" => $request->categoriaInput,
            "idClienteVenta_id" => $request->clienteInput,
            "idProductoVenta_id" => $request->productoInput
        ]); 
        
        return redirect()->route('ventas');
    }
    public function delete(request $request){
        Venta::find($request->id)->delete();
        return response()->json(["test"=>"roli"]);
    }

}
