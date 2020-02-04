@extends('layouts.app')

@section('content')
<div>
    <div class="justify-content-center">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">Adicionar Tarefa</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="tarefaName">Tarefa</label>
                          @if($errors->has('tarefaName'))
                            <input type="tarefaName" name="tarefaName" class="form-control is-invalid" id="tarefaName"  placeholder="Tarefa">
                            <div class="invalid-feedback">
                                {{$errors->first('tarefaName')}}
                            </div
                          @endif
                          <input type="tarefaName" name="tarefaName" class="form-control " id="tarefaName"  placeholder="Tarefa">
                        </div>
                        <div class="form-group">
                          <label for="tarefaTipo">Tipo da Tarefa</label>
                          @if($errors->has('tarefaTipo'))
                            <select class="form-control is-invalid" id="tarefaTipo" name="tarefaTipo">
                                <option selected value="">Selecione</option>
                                @foreach ($tipos as $tipos)
                                    <option value="{{$tipos->id}}">{{$tipos->tipo}}</option>
                                @endforeach
                            </select>
                                <div class="invalid-feedback">
                                    {{ $errors->first('tarefaTipo') }}
                                </div
                          @else
                          <select class="form-control" id="tarefaTipo" name="tarefaTipo">
                                <option selected value="">Selecione</option>
                                @foreach ($tipos as $tipos)
                                    <option value="{{$tipos->id}}">{{$tipos->tipo}}</option>
                                @endforeach
                          </select>
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="tarefaTipo">Equipe da Tarefa</label>
                            @if($errors->has('tarefaEquipe'))
                              <select class="form-control is-invalid" id="tarefaEquipe" name="tarefaEquipe">
                                  <option selected value="">Selecione</option>
                                  @foreach ($equipes as $equipe)
                                      <option value="{{$equipe->id}}">{{$equipe->tipo}}</option>
                                  @endforeach
                              </select>
                                  <div class="invalid-feedback">
                                      {{ $errors->first('tarefaEquipe') }}
                                  </div
                            @else
                            <select class="form-control" id="tarefaEquipe" name="tarefaEquipe">
                                  <option selected value="">Selecione</option>
                                  @foreach ($equipes as $equipe)
                                      <option value="{{$equipe->id}}">{{$equipe->name}}</option>
                                  @endforeach
                            </select>
                            @endif
                          </div>
                        <div class="form-group">
                            <label for="tarefaPrioridade">Prioridade da Tarefa</label>
                            @if($errors->has('tarefaPrioridade'))
                            <select class="form-control is-invalid" id="tarefaPrioridade" name="tarefaPrioridade">
                                <option selected value="">Selecione</option>
                                @foreach ($prioridades as $prioridade)
                                    <option value="{{$prioridade->id}}">{{$prioridade->prioridade}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('tarefaPrioridade') }}
                            </div>
                            @else
                            <select class="form-control" id="tarefaPrioridade" name="tarefaPrioridade">
                                <option selected value="">Selecione</option>
                                @foreach ($prioridades as $prioridade)
                                    <option value="{{$prioridade->id}}">{{$prioridade->prioridade}}</option>
                                @endforeach
                            </select>
                            @endif
                          </div>
                        <div class="form-group">
                          <label for="tarefaDescreve">Descrição</label>
                          @if($errors->has('tarefaDescreve'))
                          <input type="tarefaDescreve" name="tarefaDescreve" class="form-control is-invalid" id="tarefaDescreve"  placeholder="Descrição">
                          <div class="invalid-feedback">
                            {{ $errors->first('tarefaDescreve') }}
                          </div>
                          @else
                            <input type="tarefaDescreve" name="tarefaDescreve" class="form-control" id="tarefaDescreve"  placeholder="Descrição">
                          @endif
                        </div>
                        <div class="form-group">
                            <label for="subTarefas">Etapas</label>
                            @if($errors->has('subTarefas'))
                              <input type="subTarefas" name="subTarefas" class="form-control is-invalid" id="subTarefas"  placeholder="Etapas">
                              <div class="invalid-feedback">
                                  {{$errors->first('subTarefas')}}
                              </div
                            @endif
                            <div class="card">
                                <div class="card-body" id="subTarefasAppend">
                                    <div class="d-flex justify-content-between" id="subTarefas" name = "">
                                        <input type="subTarefas" name="subTarefas[]" class="form-control mr-2" id="subTarefas"  placeholder="Etapas">
                                        <button href="#" type="button" onclick="remove(this.parentNode.id)"><i class="material-icons">remove</i></button>
                                    </div>
                                </div>
                                <div class="d d-flex justify-content-center">
                                    <label for="addSubtarefa">
                                        Adicionar nova Etapa
                                    </label>
                                    <button href="#" type="button" class="ml-3" name="addSubtarefa"  onclick="toogle()"><i class="material-icons">add</i></button>
                                </div>
                            </div>

                          </div>
                        <button type="submit" class="btn btn-primary mb-2">Inserir</button>
                      </form>
                </div>

    </div>
</div>
@endsection
<script type="application/javascript">
    increments = 1;
    function toogle(){
        increments++;
        var div = document.createElement('div');
        div.innerHTML = document.getElementById('subTarefas').innerHTML;
        div.id = "subTarefas[".concat(increments).concat("]");
        div.className = "d-flex justify-content-between mt-2";
        document.getElementById('subTarefasAppend').appendChild(div);
    }
    function remove(id) {
        if(document.getElementById('subTarefasAppend').childElementCount > 1){
            document.getElementById('subTarefasAppend').removeChild(document.getElementById(id));
        }
      }
</script>
