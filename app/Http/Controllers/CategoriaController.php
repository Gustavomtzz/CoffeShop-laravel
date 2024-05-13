<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Resources\CategoriaCollection;

class CategoriaController extends Controller
{

    public function index()
    {
        /** MODOS DE RETORNAR UN JSON EN LARAVEL */

        /** MODO CLASICO **/
        // return response()->json(["categorias" => Categoria::all()]);

        /** MODO MEDIANTE API RESOURCES **/
        return new CategoriaCollection(Categoria::all());
    }
}
