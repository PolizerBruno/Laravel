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
                    <table class="table table-borderless table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)
                            <tr>
                                <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} / {{count($funcionarios)}}</span></th>

                                    <td>{{$funcionario->name }}</td>
                                    <td>
                                        <span class="d-flex justify-content-center">
                                            <form method="POST" action="/home/funcionarioRemover/{{$funcionario->id}}">
                                                @csrf
                                                @method('Delete')
                                               <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">delete_forever</i></button>
                                           </form>
                                           <a class="btn btn-sm" href="/home/funcionarios/{{$funcionario->id}}/edit" role="button" type="submit"><i class="material-icons md-18">edit</i></a>
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
    <div>
@endsection
