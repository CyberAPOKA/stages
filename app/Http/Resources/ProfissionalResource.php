<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfissionalResource extends JsonResource
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
            'cursosrealizados' => $this->cursosrealizados,
            'outrosconhecimentos' => $this->outrosconhecimentos,
            'experienciasprofissionais' => $this->experienciasprofissionais,
            'jafoiestagiario' => $this->jafoiestagiario,
            'inicioperiodo' => $this->inicioperiodo,
            'fimperiodo' => $this->fimperiodo,
            'secretaria' => $this->secretaria,
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'candidatoes' => new CandidatoCollection($this->whenLoaded('candidatoes')),
            'candidato' => new CandidatoResource($this->whenLoaded('candidato'))
        ];
    }
}
