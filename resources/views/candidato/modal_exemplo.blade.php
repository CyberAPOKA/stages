<div class="modal fade" id="yourModal{{$f->candidato->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true"></span></button> --}}
                <h4 class="modal-title" id="myModalLabel">{{$f->candidato->user->name}}</h4>
            </div>
            <div class="modal-body">
                <dl class="row">

                    <p class="h5 col-sm-12" style="font-weight: bold; font-size: 16px; color: #312f2f;">Dados Pessoais
                    </p>

                    <dt class="col-sm-3">Nome</dt>
                    <dd class="col-sm-9">{{isset($candidato->user->name) ? $candidato->user->name : ''}}</dd>

                    <dt class="col-sm-3">Nome social</dt>
                    <dd class="col-sm-9">{{isset($candidato->user->nomesocial) ? $candidato->user->nomesocial : ''}}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{isset($candidato->user->email) ? $candidato->user->email : ''}}</dd>

                    <dt class="col-sm-3">CPF</dt>
                    <dd class="col-sm-9">{{isset($candidato->user->cpf) ? $candidato->user->cpf : ''}}</dd>

                    <dt class="col-sm-3">RG</dt>
                    <dd class="col-sm-9">{{isset($candidato->rg) ? $candidato->rg : ''}}</dd>

                    <dt class="col-sm-3">Telefone</dt>
                    <dd class="col-sm-9">{{isset($candidato->telefone) ? $candidato->telefone : ''}}</dd>

                    <dt class="col-sm-3">Data de nascimento</dt>
                    <dd class="col-sm-9">
                        {{isset($candidato->data_nascimento) ? $candidato->data_nascimento->format('d/m/Y') : ''}}</dd>

                    <dt class="col-sm-3">Nome do pai</dt>
                    <dd class="col-sm-9">{{isset($candidato->nome_pai) ? $candidato->nome_pai : ''}}</dd>

                    <dt class="col-sm-3">Nome da mãe</dt>
                    <dd class="col-sm-9">{{isset($candidato->nome_mae) ? $candidato->nome_mae : ''}}</dd>

                    <dt class="col-sm-3">Deficiência</dt>
                    <dd class="col-sm-9">{{isset($candidato->deficiencia) ? $candidato->deficiencia : ''}}</dd>

                    <dt class="col-sm-3">Raça</dt>
                    <dd class="col-sm-9">{{isset($candidato->raca) ? $candidato->raca : ''}}</dd>

                    <dt class="col-sm-3">Rua</dt>
                    <dd class="col-sm-9">{{isset($candidato->rua) ? $candidato->rua : ''}}</dd>

                    <dt class="col-sm-3">Número da rua</dt>
                    <dd class="col-sm-9">{{isset($candidato->numero_rua) ? $candidato->numero_rua : ''}}</dd>

                    <dt class="col-sm-3">Complemento</dt>
                    <dd class="col-sm-9">{{isset($candidato->complemento) ? $candidato->complemento : ''}}</dd>

                    <dt class="col-sm-3">CEP</dt>
                    <dd class="col-sm-9">{{isset($candidato->cep) ? $candidato->cep : ''}}</dd>

                    <dt class="col-sm-3">Bairro</dt>
                    <dd class="col-sm-9">{{isset($candidato->bairro) ? $candidato->bairro : ''}}</dd>

                    <dt class="col-sm-3">Cidade</dt>
                    <dd class="col-sm-9">{{isset($candidato->cidade) ? $candidato->cidade : ''}}</dd>

                    <br>
                    <br>
                    <br>

                    <p class="h5 col-sm-12" style="font-weight: bold; font-size: 16px; color: #312f2f;">Formação</p>

                    @foreach($candidato->formacao as $formacao)

                    <dt class="col-sm-3">Curso</dt>
                    <dd class="col-sm-9">
                        {{isset($formacao->listaCursos->curso) ? $formacao->listaCursos->curso : ''}}
                        ({{isset($formacao->situacao) ? $formacao->situacao : ''}}),</dd>

                    <dt class="col-sm-3">Semestre</dt>
                    <dd class="col-sm-9">
                        {{isset($formacao->semestre) ? $formacao->semestre : ''}}</dd>

                    <dt class="col-sm-3">Turno</dt>
                    <dd class="col-sm-9">
                        {{isset($formacao->turno) ? $formacao->turno : ''}}</dd>

                    <dt class="col-sm-3">Instituição</dt>
                    <dd class="col-sm-9">
                        {{isset($formacao->instituicao) ? $formacao->instituicao : ''}}</dd>
                    <br>
                    <br>
                    <br>
                    @endforeach

                    <p class="h5 col-sm-12" style="font-weight: bold; font-size: 16px; color: #312f2f;">Profissional</p>

                    @foreach($candidato->profissional as $profissional)

                    <dt class="col-sm-3">Nome da empresa</dt>
                    <dd class="col-sm-9">
                        {{isset($profissional->nome_empresa) ? $profissional->nome_empresa : ''}} </dd>

                    <dt class="col-sm-3">Data de entrada</dt>
                    <dd class="col-sm-9">
                        {{isset($profissional->data_entrada) ? $profissional->data_entrada : ''}}</dd>

                    @if($profissional->emprego_atual == 0)
                    <dt class="col-sm-3">Data de saída</dt>
                    <dd class="col-sm-9">
                        {{isset($profissional->data_saida) ? $profissional->data_saida : ''}}</dd>
                    @endif

                    <dt class="col-sm-3">Emprego atual</dt>
                    <dd class="col-sm-9">
                        @if(isset($profissional->emprego_atual)) @if($profissional->emprego_atual == 1) Sim @else
                        Não @endif @endif
                    </dd>
                    <br>
                    <br>
                    <br>
                    @endforeach

                    <p class="h5 col-sm-12" style="font-weight: bold; font-size: 16px; color: #312f2f;">Curso(s)
                        extra(s)</p>

                    @foreach($candidato->cursoextra as $cursoextra)

                    <dt class="col-sm-3">Curso</dt>
                    <dd class="col-sm-9">
                        {{isset($cursoextra->curso) ? $cursoextra->curso : ''}} </dd>

                    <dt class="col-sm-3">Instituição</dt>
                    <dd class="col-sm-9">
                        {{isset($cursoextra->instituicao) ? $cursoextra->instituicao : ''}}</dd>

                    <dt class="col-sm-3">Conclusão</dt>
                    <dd class="col-sm-9">
                        {{isset($cursoextra->conclusao) ? $cursoextra->conclusao : ''}}</dd>
                    <br>
                    <br>
                    <br>
                    @endforeach
                </dl>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
