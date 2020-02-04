@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-lg-center">

        <div class="col-xl-12">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tipo</th>
                    @if(auth()->user()->admin)
                        <th scope="col">Equipe</th>
                    @else

                    @endif

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
                            @if(auth()->user()->admin)
                                <td>{{$tarefa->equipes->name}}</td>
                            @else
                            @endif
                            <td>
                                <span class="d-flex justify-content-center">
                                    @if(auth()->user()->admin)
                                        <form method="POST" action="/home/tarefasRemovidas/{{$tarefa->id}}">
                                            @csrf
                                        <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">restore</i></button>
                                        </form>
                                        <form method="POST" action="/home/tarefasRemovidas/{{$tarefa->id}}">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">delete_forever</i></button>
                                        </form>
                                    @else
                                        <form method="POST" action="/home/tarefasRemovidas/{{$tarefa->id}}">
                                            @csrf
                                        <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">restore</i></button>
                                        </form>
                                    @endif

                                </span>
                            </td>

                        </tr>
                    @endforeach
                  <tr>
                </tbody>
              </table>
        </div>

    </div>
</div>

@endsection
