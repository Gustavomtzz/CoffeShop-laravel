<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'imagen' => $this->imagen,
            'disponibilidad' => $this->disponibilidad,
            'categoria_id' => $this->categoria_id,
            // 'nombre_id' => $this->id . " - " . $this->name, //Metodo para Concatenar columnas a retornar en JSON
        ];
    }
}
