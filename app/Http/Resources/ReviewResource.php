<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'comercio_id' => $this->comercio_id,
            'client' => [
                'name' => $this->cliente->name,
                'picture' => $this->cliente->picture,
                'id' => $this->cliente->id
            ],
            'score' => $this->score,
            'content' => $this->content,
            'published' => $this->created_at
        ];
    }
}
