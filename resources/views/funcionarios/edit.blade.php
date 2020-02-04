@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar {{$funcionario->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="tarefaName">Name</label>
                          <input type="tarefaName" name="name" class="form-control" value="{{$funcionario->name}}" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="funcao">Função</label>
                            <select class="form-control" id="funcao" name="funcao">
                                <option selected value="{{$funcionario->funcao_id}}">{{$funcionario->funcoes->name}}</option>
                                @foreach ($funcoes as $funcao)
                                    <option value="{{$funcao->id}}">{{$funcao->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="equipe">Equipe</label>
                            <select class="form-control" id="equipe" name="equipe">
                                <option selected value="{{$funcionario->equipe_id}}">{{$funcionario->equipes->name}}</option>
                                @foreach ($equipes as $equipe)
                                    <option value="{{$equipe->id}}">{{$equipe->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="admin">Admin</label>
                            @if($funcionario->admin)
                                <input name="admin" id="admin" type="checkbox" value= "1" checked>
                            @else
                                <input name="admin" id="admin" type="checkbox" value= "1">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
