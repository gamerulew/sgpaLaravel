@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Editar apiário</div>
                        <div class="float-right"><a href="{{route('apiarios')}}" class="btn btn-sm btn-success">Voltar</a></div>
                    </div>

                    <div class="card-body">
                        @if($apiario != null)
                        @csrf
                        <form action="{{route('editarApiarioPost')}}" method="post">
                            <input type="hidden" name="id" id="id" value="{{$apiario->getId()}}">
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
                                <div class="col-md-8">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome" value="{{$apiario->getNome()}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Data da ultima visita</label>
                                    <input type="date" class="form-control" name="dataVisita" id="dataVisita" value="{{$apiario->getDataVisita()}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Localização</label>
                                    <input type="text" class="form-control" name="localizacao" id="localizacao" value="{{$apiario->getLocalizacao()}}" required>
                                </div>
                            </div>
                            <hr>
                            <h6 class="font-weight-bold">Total de caixas</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Melgueiras</label>
                                    <input type="number" class="form-control" name="melgueiras" id="melgueiras" value="{{$apiario->getMelgueiras()}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Ninhos</label>
                                    <input type="number" class="form-control" name="ninhos" id="ninhos" value="{{$apiario->getNinhos()}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Enxames</label>
                                    <input type="number" class="form-control" name="enxames" id="enxames" value="{{$apiario->getEnxames()}}" required>
                                </div>
                            </div>
                            <hr>
                            <h6 class="font-weight-bold">Caixas adicionadas na ultima visita</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Melgueiras</label>
                                    <input type="number" class="form-control" name="melgueirasNovas" id="melgueirasNovas" value="{{$apiario->getMelgueirasNovas()}}">
                                </div>
                                <div class="col-md-6">
                                    <label>Ninhos</label>
                                    <input type="number" class="form-control" name="ninhosNovos" id="ninhosNovos" value="{{$apiario->getNinhosNovos()}}">
                                </div>
                            </div>
                            <div class="row my-2 text-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Editar</button>
                                    <a href="{{route('deletarApiario',['id'=>$apiario->getId()])}}" type="submit" class="btn btn-danger">Deletar</a>
                                </div>
                            </div>
                        </form>
                        @else
                        Apiário não encontrado
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

