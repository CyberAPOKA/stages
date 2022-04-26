<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'linkedin' => $this->linkedin,
            'outro' => $this->outro,
            'links' => $this->links,
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'candidatoes' => new CandidatoCollection($this->whenLoaded('candidatoes')),
            'candidato' => new CandidatoResource($this->whenLoaded('candidato'))
        ];
    }
}
