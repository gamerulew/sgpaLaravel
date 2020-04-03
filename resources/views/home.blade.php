@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Painel de controle</div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Apiários</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">C R U D</h6>
                                    <p class="card-text">Cadastrar, editar e excluir apiário</p>
                                    <a href="{{route('apiarios')}}" class="btn btn-sm btn-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 my-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Galões de Mel</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">C R U D</h6>
                                    <p class="card-text">Cadastrar, editar e excluir galões de mel</p>
                                    <a href="{{route('galoes')}}" class="btn btn-sm btn-primary">Visualizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

