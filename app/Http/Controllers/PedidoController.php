<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mockery\Undefined;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {

        if (!$request->filled('estado') && !$request->filled('name')) {
            $pedidos = Pedido::with('productos:id,nombre,precio')->with('user:id,name,email')->get();
        }


        if ($request->filled('estado')) {
            if ($request->estado == 2) {
                $pedidos = Pedido::when($request->name, function ($query) use ($request) {
                    $query->whereHas('user', function ($query) use ($request) {
                        $query->where('name', 'LIKE', '%' . $request->name . '%');
                    });
                })
                    ->with('productos:id,nombre,precio')
                    ->with('user:id,name,email')
                    ->get();
            } else {
                $pedidos = Pedido::where('estado', $request->estado)
                    ->when($request->has('name'), function ($query) use ($request) {
                        $query->whereHas('user', function ($query) use ($request) {
                            $query->where('name', 'LIKE', '%' . $request->name . '%');
                        });
                    })
                    ->with('productos:id,nombre,precio')
                    ->with('user:id,name,email')
                    ->get();
            }
        }
        return response()->json(compact("pedidos"), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //Accedemos al valor de [total, productos] en la Solicitud Http
        $total = $request->input("total");

        $productos = $request->input("productos");

        //Creamos el Pedido en la Base de Datos
        $pedido = Pedido::create([
            "user_id" => $request->user()->id,
            "total" => $total,
        ]);


        //**AGREGAR A LA TABLA INTERMEDIA */
        //Iterar el arreglo de productos
        foreach ($productos as $producto) {
            // Adjunta cada producto y su cantidad a la tabla pivote
            $pedido->productos()->attach(
                $producto["id"],
                ['cantidad' => $producto['cantidad']]
            );
        }

        //Devolver respuesta de ERROR si no se creo el Pedido
        if (!$pedido) {
            return response()->json(["errors" => "No se pudo crear el pedido correctamente"], 422);
        }

        //Devolver respuesta Correcta si se creo el Pedido
        return  response()->json(compact("pedido"), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido): JsonResponse
    {
        //Verificamos si existe un pedido
        if ($pedido) {
            //Actualizamos su Estado (1=Completado)
            $pedido->estado = 1;
            //Guardamos con el nuevo "Estado"
            $pedido->save();
            // Recarga el pedido actualizado con las relaciones cargadas nuevamente
            $pedido->loadRelationships();
            //Devolvemos una respuesta completada con el status 200
            return response()->json(compact("pedido"), 200);
        } else {
            // Maneja el caso donde el pedido no existe
            return response()->json(["errors" => "Pedido no encontrado"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
