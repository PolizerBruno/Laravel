@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header">Perfil de {{$user->name}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="post">
                        @csrf
                            <div class="form-group  p-2">
                                @if ($errors->has('name'))
                                    <label for="name">Name</label>
                                    <input type="name" name="name" class="form-control is-invalid" value="{{$user->name}}" id="name" placeholder="Tarefa">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @else
                                    <label for="name">Name</label>
                                    <input type="name" name="name" class="form-control" value="{{$user->name}}" id="name" placeholder="Tarefa">
                                @endif
                            </div>
                            <div class="form-group  p-2">
                                @if ($errors->has('oldPassword'))
                                    <label for="oldPassword">Old Password</label>
                                    <input type="password" name="oldPassword" class="form-control is-invalid"  id="oldPassword" placeholder="Old Password">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('oldPassword') }}
                                    </div>
                                @else
                                <label for="oldPassword">Old Password</label>
                                <input type="password" name="oldPassword" class="form-control"  id="oldPassword" placeholder="Old Password">
                                @endif

                            </div>
                            <div class="form-group  p-2">
                                @if ($errors->has('newPassaword'))
                                <label for="newPassaword">New Password</label>
                                <input type="password" name="newPassaword" class="form-control is-invalid"  id="newPassaword" placeholder="Insert the new password">
                                <div class="invalid-feedback">
                                    {{ $errors->first('newPassaword') }}
                                </div
                                @else
                                    <label for="newPassaword">New Password</label>
                                    <input type="password" name="newPassaword" class="form-control"  id="newPassaword" placeholder="Insert the new password">
                                @endif
                            </div>
                            <div class="form-group  p-2">
                            @if ($errors->has('newPassaword2'))
                                <label for="newPassaword2">Repeat the new Password</label>
                                <input type="password" name="newPassaword2" class="form-control is-invalid"  id="newPassaword2" placeholder="Repeat the new passowrd">
                                <div class="invalid-feedback">
                                    {{ $errors->first('newPassaword2') }}
                                </div
                            @else
                                <label for="newPassaword2">Repeat the new Password</label>
                                <input type="password" name="newPassaword2" class="form-control"  id="newPassaword2" placeholder="Repeat the new passowrd">
                            @endif
                            </div>
                        <button type="submit" class="btn btn-primary p-2 m-2">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

