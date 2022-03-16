<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandidatoResource extends JsonResource
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
            'nomesocial' => $this->nomesocial,
            'rg' => $this->rg,
            'telefoneresidencial' => $this->telefoneresidencial,
            'telefonecelular' => $this->telefonecelular,
            'data_nascimento' => $this->data_nascimento,
            'nome_pai' => $this->nome_pai,
            'nome_mae' => $this->nome_mae,
            'deficiencia' => $this->deficiencia,
            'raca' => $this->raca,
            'rua' => $this->rua,
            'numero_rua' => $this->numero_rua,
            'complemento' => $this->complemento,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'formacaos' => new FormacaoCollection($this->whenLoaded('formacaos')),
            'profissionals' => new ProfissionalCollection($this->whenLoaded('profissionals')),
            'cursos' => new CursoCollection($this->whenLoaded('cursos')),
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
