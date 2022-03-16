<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormacaoResource extends JsonResource
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
            'escolaridade' => $this->escolaridade,
            'area' => $this->area,
            'curso' => $this->curso,
            'semestre' => $this->semestre,
            'turno' => $this->turno,
            'instituicao' => $this->instituicao,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'candidatoes' => new CandidatoCollection($this->whenLoaded('candidatoes')),
            'candidato' => new CandidatoResource($this->whenLoaded('candidato'))
        ];
    }
}
