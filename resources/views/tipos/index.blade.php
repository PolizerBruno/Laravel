@extends('layouts.app')

@section('content')
<div>
    <div class="justify-content-center">
        <div class="">
            <div class="card p-2">
                <div class="card-header border d-flex justify-content-center">Adicionar Categorias</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                </div>
                <div class="row justify-content-lg-center">

                    <div class="col-xl-12">
                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse"
                                data-target="#collapseTipo" aria-expanded="false" aria-controls="collapseTipo">
                                Tipo
                            </button>
                            <button class="btn btn-danger" type="button" data-toggle="collapse"
                                data-target="#collapsePrioridade" aria-expanded="false" aria-controls="collapsePrioridade">
                                Prioridade
                            </button>
                            <button class="btn btn-success" type="button" data-toggle="collapse"
                                data-target="#collapseEquipe" aria-expanded="false" aria-controls="collapseEquipe">
                                Equipe
                            </button>
                        </p>
                        <div class="collapse mt-2" id="collapseTipo">
                            <div class="card card-body">
                                <form method="POST" action="/home/adicionarTipo">
                                    @csrf
                                    <div class="form-group">
                                        <label for="tipoName">Tipo</label>
                                        @if($errors->has('tipoName'))
                                        <input type="tipoName" name="tipoName" class="form-control is-invalid" id="tipoName"
                                            placeholder="Tipo">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('tipoName') }}
                                        </div>
                                        @else
                                        <input type="tipoName" name="tipoName" class="form-control" id="tipoName"
                                            placeholder="Tipo">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Inserir</button>
                                </form>
                                <table class="table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tipos as $tipo)
                                        <tr>
                                            <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} /
                                                    {{count($tipos)}}</span></th>

                                            <td>{{$tipo->tipo }}</td>
                                            <td>
                                                <span class="d-flex justify-content-center">

                                                    <form method="POST" action="/home/tiposRemovidas/{{$tipo->id}}">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="btn btn-sm" role="button" type="submit"><i
                                                                class="material-icons md-18">delete_forever</i></button>
                                                    </form>

                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="collapse mt-2" id="collapsePrioridade">
                            <div class="card card-body">
                                <form method="POST" action = "/home/adicionarPrioridade">
                                    @csrf
                                    <div class="form-group">
                                        <label for="prioridadeName">Prioridade</label>
                                        @if($errors->has('tipoName'))
                                        <input type="prioridadeName" name="prioridadeName" class="form-control is-invalid" id="prioridadeName"
                                            placeholder="Prioridade">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('prioridadeName') }}
                                        </div>
                                        @else
                                        <input type="prioridadeName" name="prioridadeName" class="form-control" id="prioridadeName"
                                            placeholder="Prioridade">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Inserir</button>
                                </form>
                                <table class="table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Prioridades</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prioridades as $prioridade)
                                        <tr>
                                            <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} /
                                                    {{count($prioridades)}}</span></th>
                                            <td>{{$prioridade->prioridade}}</td>
                                            <td>
                                                <span class="d-flex justify-content-center">

                                                    <form method="POST" action="/home/prioridadeRemovidas/{{$prioridade->id}}">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="btn btn-sm
                                                        " role="button" type="submit"><i
                                                                class="material-icons md-18">delete_forever</i></button>
                                                    </form>

                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="collapse mt-2" id="collapseEquipe">
                            <div class="card card-body">
                                <form method="POST" action="/home/adicionarEquipe">
                                    @csrf
                                    <div class="form-group">
                                        <label for="equipeName">Equipe</label>
                                        @if($errors->has('equipeName'))
                                        <input type="equipeName" name="equipeName" class="form-control is-invalid" id="equipe"
                                            placeholder="Equipe">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('equipeName') }}
                                        </div>
                                        @else
                                        <input type="equipeName" name="equipeName" class="form-control" id="equipeName"
                                            placeholder="Equipe">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Inserir</button>
                                </form>
                                <table class="table table-borderless table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Equipes</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipes as $equipe)
                                        <tr>
                                            <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} /
                                                    {{count($equipes)}}</span></th>

                                            <td>{{$equipe->name }}</td>
                                            <td>
                                                <span class="d-flex justify-content-center">

                                                    <form method="POST" action="/home/equipeRemovidas/{{$equipe->id}}">
                                                        @csrf
                                                        @method('Delete')
                                                        <button class="btn btn-sm" role="button" type="submit"><i
                                                                class="material-icons md-18">delete_forever</i></button>
                                                    </form>

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
                </div>
            </div>
        </div>
    </div>
    <div>
        @endsection
