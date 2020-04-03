@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Apiários cadastrardos</div>
                        <div class="float-right"><a href="{{route('cadastrarApiario')}}" class="btn btn-sm btn-success">+</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                @if(sizeof($apiarios) > 0)
                                    @foreach($apiarios as $apiario)
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="float-left">{{$apiario->getNome()}}
                                                    - {{$apiario->getLocalizacao()}}</div>
                                                <div class="float-right"><a
                                                        href="{{route('apiario',['id'=>$apiario->getId()])}}"
                                                        class="btn btn-sm btn-primary">Editar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <p>Ultima visita em {{$apiario->getDataVisita()}}, foi adicionado {{$apiario->getNinhosNovos()}} ninho(s) e {{$apiario->getMelgueirasNovas()}} melgueira(s)</p>
                                    @endforeach
                                @else
                                    Não há apiários cadastrados
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

