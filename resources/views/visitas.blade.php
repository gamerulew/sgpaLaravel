@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Visitas cadastrardos</div>
                        <div class="float-right"><a href="{{route('cadastrarVisita')}}"
                                                    class="btn btn-sm btn-success">+</a></div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                @if(sizeof($visitas) > 0)
                                    <?php $pesoTotal = 0; ?>
                                    @foreach($visitas as $visita)
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 font-weight-bolder">
                                                <div class="float-left">{{$visita->getNomes()}}
                                                    - {{$visita->getDataVisita()}}
                                                </div>
                                                <div class="float-right">
                                                    <a href="{{route('visita',['id'=>$visita->getId()])}}"
                                                       class="btn btn-sm btn-primary">Editar</a>
                                                    <a class="btn btn-sm btn-primary" data-toggle="collapse"
                                                       href="#collapse{{$visita->getId()}}" role="button"
                                                       aria-expanded="false"
                                                       aria-controls="multiCollapseExample1">Ver apiários</a>
                                                </div>
                                            </div>

                                            <div class="col-12 my-2">
                                                <div class="collapse multi-collapse" id="collapse{{$visita->getId()}}">
                                                    <div class="card card-body">
                                                        @foreach($visita->apiariosVisitados() as $apiarioV)
                                                            @foreach($apiarios as $apiario)
                                                                @if($apiario->getId() == $apiarioV->getApiario())
                                                                    <div class="my-3">
                                                                        Apiário {{$apiario->getNome()}}
                                                                        <hr>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <span class="font-weight-bold">Melgueiras Adicionadas: </span>{{$apiarioV->getMelgueirasAdd()}}
                                                                                <br>
                                                                                <span class="font-weight-bold">Melgueiras Removidas: </span>{{$apiarioV->getMelgueirasRmv()}}
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <span class="font-weight-bold">Ninhos Adicionadas: </span>{{$apiarioV->getNinhosAdd()}}

                                                                                <br>
                                                                                <span class="font-weight-bold">Ninhos removidos: </span>{{$apiarioV->getNinhosRmv()}}
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <span class="font-weight-bold">Total de caixas add: </span>{{$apiarioV->getMelgueirasAdd()+$apiarioV->getNinhosAdd()}}
                                                                                <br>
                                                                                <span class="font-weight-bold">Total de caixas rmv: </span>{{$apiarioV->getMelgueirasRmv()+$apiarioV->getNinhosRmv()}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach
                                @else
                                    <div class="text-center">
                                    <img src="{{asset('img/visitas.png')}}" width="80">
                                        <br>
                                        <h5>Não há visitas cadastradas</h5>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="my-3">

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

