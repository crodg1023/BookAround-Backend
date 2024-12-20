<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComercioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $images = $this->images->map(function ($image) {
            $path = public_path('uploads/' . $image->name);
            return file_exists($path) ? asset('uploads/' . $image->name) : null;
        })->filter()->values();

        return [
            'id' => $this->id,
            'user' => new UsuarioResource($this->usuario),
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'pictures' => $this->pictures,
            'price' => $this->price,
            'images' => $images,
            'workingHours' => [
                'opening' => $this->starting_hour,
                'closing' => $this->closing_hour
            ],
            'description' => $this->description,
            'score' => $this->score,
            'categories' => CategoriaResource::collection($this->categorias),
        ];
    }
}
