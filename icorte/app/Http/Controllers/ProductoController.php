<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try{
            $productos = Producto::all();
            return response()->json(['status' => 'success', 'data' => $productos]);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

      
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $producto = Producto::create($request->all());
            return response()->json(['status' => 'success', 'message' => 'Producto creado correctamente', 'data' => $producto]);
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try{
            $producto = Producto::find($id);
            if($producto){
                return response()->json(['status' => 'success', 'data' => $producto]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Producto no encontrado']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{

            $producto = Producto::find($id);
           
            $producto->update($request->all());
            return response()->json(['status' => 'success', 'message' => 'Producto actualizado correctamente', 'data' => $producto]);
        } 
        
        catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{

            $producto = Producto::find($id);
            $producto->delete();
            return response()->json(['status' => 'success', 'message' => 'Producto eliminado correctamente']);
        } 
        
        catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
