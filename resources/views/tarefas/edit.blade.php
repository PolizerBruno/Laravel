@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="">
            <div class="card p-2">
                <div class="card-header border d-flex justify-content-center">Editar Tarefa</div>

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
                          <input type="tarefaName" name="tarefaName" class="form-control" value="{{$tarefas->name}}" id="tarefaName" placeholder="Tarefa">
                        </div>
                        <div class="form-group">
                          <label for="tarefaTipo">Tipo da Tarefa</label>
                          <select class="form-control" id="tarefaTipo" name="tarefaTipo">
                            <option selected value="{{$tarefas->tipo_id}}">{{$tarefas->tipos->tipo}}</option>
                            @foreach ($tipos as $tipos)
                                <option value="{{$tipos->id}}">{{$tipos->tipo}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="tarefaPrioridade">Prioridade da Tarefa</label>
                            <select class="form-control" id="tarefaPrioridade" name="tarefaPrioridade">
                                <option selected value="{{$tarefas->prioridade_id}}">{{$tarefas->prioridades->prioridade}}</option>
                            @foreach ($prioridades as $prioridade)
                                <option value="{{$prioridade->id}}">{{$prioridade->prioridade}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="tarefaDescreve">Descrição</label>
                          <textarea class="form-control" id="tarefaDescreve"  name="tarefaDescreve" rows="3">{{$tarefas->text}}</textarea>
                        </div>
                        <div class="card">
                            <div class="card-body" id="subTarefasAppend">
                                @foreach($subtarefas as $subtarefa)
                                <div class="d-flex justify-content-between mb-2" id="subTarefas" name = "">
                                    <input type="subTarefas"  value="{{$subtarefa->name}}" name="subTarefas[]" class="form-control mr-2" id="subTarefas"  placeholder="Etapas">
                                    <button href="#" type="button" onclick="remove(this.parentNode.id)"><i class="material-icons">remove</i></button>
                                </div>
                                @endforeach
                            </div>
                            <div class="d d-flex justify-content-center">
                                <label for="addSubtarefa">
                                    Adicionar nova Etapa
                                </label>
                                <button href="#" type="button" class="ml-3" name="addSubtarefa"  onclick="toogle()"><i class="material-icons">add</i></button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                      </form>
                </div>
            </div>
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
