@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        @csrf
                        <form action="{{route('loginPost')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    @if(session('erro'))
                                        <div class="alert alert-danger" role="alert">
                                            {{session('erro')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="col-md-6">
                                    <label>Senha</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            <div class="row my-2 text-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Logar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

