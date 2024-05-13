<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ProductoCollection;
use App\Policies\ProductoPolicy;
use Illuminate\Support\Facades\Redis;

class ProductoController extends Controller
{

    public function index()
    {
        /** MODOS DE RETORNAR UN JSON EN LARAVEL */

        return new ProductoCollection(Producto::all());
    }

    public function update(Request $request, Producto $producto)
    {
        Gate::authorize('update', Producto::class);

        // Definir reglas de validación
        $rules = [
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'disponibilidad' => 'required|numeric|between:0,1',
            'categoria_id' => 'required|exists:categorias,id',
        ];

        // Aplicar reglas de validación a la solicitud
        $datos = $request->validate($rules);

        // Verificar si se encontró el producto
        if ($producto) {
            // Usar el método update para actualizar los atributos del producto
            $producto->update([
                'nombre' => $datos['nombre'],
                'precio' => $datos['precio'],
                'disponibilidad' => $datos['disponibilidad'],
                'categoria_id' => $datos['categoria_id']
            ]);

            return response()->json(['message' => 'Producto actualizado correctamente', 'producto' => $producto], 200);
        } else {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    }

    public function destroy(Producto $producto)
    {

        Gate::authorize('delete', Producto::class);

        return response()->json(compact("producto"));
    }
}
