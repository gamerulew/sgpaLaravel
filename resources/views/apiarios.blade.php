@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Apiários cadastrardos</div>
                        <div class="float-right">
                            <a href="{{route('cadastrarApiario')}}" class="btn btn-sm btn-success">+ Apiário</a>
                            <a href="{{route('cadastrarVisita')}}" class="btn btn-sm btn-success">+ Visita</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                @if(sizeof($apiarios) > 0)
                                    @foreach($apiarios as $apiario)
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 font-weight-bolder">
                                                <div class="float-left">{{$apiario->getNome()}}
                                                    - {{$apiario->getLocalizacao()}}</div>
                                                <div class="float-right"><a
                                                        href="{{route('apiario',['id'=>$apiario->getId()])}}"
                                                        class="btn btn-sm btn-primary">Editar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        @if(isset($visitas[$apiario->getId()][0]))
                                            <p>Ultima visita em {{$visitas[$apiario->getId()][0]->dataVisita}}.
                                                @foreach($visitas[$apiario->getId()][0]->apiariosVisitados() as $apsVisitado)
                                                    @if($apsVisitado->getApiario() == $apiario->getId())
                                                        foi
                                                        adicionado {{$apsVisitado->getNinhosAdd()}}
                                                        ninho(s)
                                                        e {{$apsVisitado->getMelgueirasAdd()}}
                                                        melgueira(s).
                                                        Total {{$apsVisitado->getNinhosAdd()+$apsVisitado->getMelgueirasAdd()}}
                                                        caixa(s)</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p>Nenhuma visita foi cadastrada</p>
                                @endif
                                @endforeach
                                @else
                                    <div class="text-center">
                                        <img src="{{asset('img/apiarios.png')}}" width="100">
                                        <br>
                                        <h5>Não há apiários cadastrados</h5>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

