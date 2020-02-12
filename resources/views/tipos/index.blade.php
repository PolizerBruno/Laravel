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
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="tipoName">Tipo</label>
                          @if($errors->has('tipoName'))
                            <input type="tipoName" name="tipoName" class="form-control is-invalid" id="tipoName" placeholder="Tipo">
                            <div class="invalid-feedback">
                                {{ $errors->first('tipoName') }}
                              </div>
                          @else
                            <input type="tipoName" name="tipoName" class="form-control" id="tipoName" placeholder="Tipo">
                          @endif
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Inserir</button>
                      </form>
                    </div>
                    <div class="row justify-content-lg-center">

                        <div class="col-xl-12">
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
                                        <th scope="row"><span class="badge badge-secondary">{{$loop->iteration}} / {{count($tipos)}}</span></th>

                                            <td>{{$tipo->tipo }}</td>
                                            <td>
                                                <span class="d-flex justify-content-center">
                                                    <form method="POST" action="/home/tiposRemovidas/{{$tipo->id}}">
                                                        @csrf
                                                        @method('Delete')
                                                       <button class="btn btn-sm" role="button" type="submit"><i class="material-icons md-18">delete_forever</i></button>
                                                   </form>
                                                   <a class="btn btn-sm" href="#" role="button" type="submit"><i class="material-icons md-18">edit</i></a>
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
    <div>
@endsection
