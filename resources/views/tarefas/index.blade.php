@extends('layouts.app')
@section('content')
<div class="container">
        <div class="">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Equipe</th>
                    <th scope="col">Etapas</th>
                    <th scope="col">Progresso</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tarefas as $tarefa)
                        <tr>
                            <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} / {{count($tarefas)}}</span></th>
                                <td>{{$tarefa->prioridades->prioridade}}</td>
                                <td>{{$tarefa->name}}</td>
                                <td>{{$tarefa->text }}</td>
                                <td>{{$tarefa->tipos->tipo }}</td>
                                <td>{{$tarefa->equipes->name}}</td>
                                <td>
                                    @foreach($subtarefas as $subtarefa)
                                        @if($subtarefa->tarefa_id == $tarefa->id)
                                            <ul class="list-group list-group-flush d-flex justify-content-between">
                                                 {{$subtarefa->name}}
                                                <form action="/home/subtarefas/{{$subtarefa->id}}/update" method="POST" name = "subTarefaForm">
                                                    @csrf
                                                    <select name="estado" id ="estado" onchange="this.form.submit()">
                                                        <option value = "{{$subtarefa->estado->id}}">{{$subtarefa->estado->name}}</option>
                                                        @foreach($estados as $estado)
                                                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </ul>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width:{{$porcentagem[$tarefa->id]}}" aria-valuenow="{{$porcentagem[$tarefa->id]}}" aria-valuemin="0" aria-valuemax="100">{{$porcentagem[$tarefa->id]}}%</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="d-flex justify-content-center">
                                        @if(auth()->user()->admin)
                                        <form method="post" action="/home/minhasTarefas/{{$tarefa->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete"/>
                                            <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">delete</i></button>
                                        </form>
                                        <a class="btn btn-sm" href="/home/{{$tarefa->id}}/edit" role="button" type="submit"><i class="material-icons md-18">edit</i></a>
                                        @else
                                        <form method="post" action="/home/minhasTarefas/{{$tarefa->id}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete"/>
                                            <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">delete</i></button>
                                        </form>
                                        @endif
                                    </span>
                                </td>
                        </tr>
                    @endforeach
                  <tr>
                </tbody>
              </table>
              <form method="POST">
                @csrf
                <div class="row">
                    <div class="col-6 d-flex justify-content-center">
                         <select class="form-control" id="ordernar" name="ordernar">
                            <option value="" selected>Ordernar</option>
                            <option value="name">Nome</option>
                            <option value="prioridade cresc">Prioridade Crescente</option>
                            <option value="prioridade decr" >Prioridade Decrescente</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Ordenar</button>
                    </div>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection

<script>
    function formRequest(id){

    }
</script>
