@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Cadastrar visita</div>
                        <div class="float-right"><a href="{{route('visitas')}}"
                                                    class="btn btn-sm btn-success">Voltar</a></div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('cadastrarVisitaPost')}}" method="post">
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
                                    <label>Nomes</label>
                                    <input type="text" class="form-control" name="nomes" id="nomes" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Data da visita</label>
                                    <input type="date" class="form-control" name="dataVisita" id="dataVisita" required>
                                </div>
                            </div>
                            <hr>
                            <h6 class="font-weight-bold">Apiários</h6>
                            @if(sizeof($apiarios) > 0)

                                <div class="accordion" id="accordionExample">
                                    @foreach($apiarios as $apiario)
                                        <div class="card">
                                    <div class="card-header" id="heading{{$apiario->getId()}}">
                                            <a type="button" data-toggle="collapse"
                                                    data-target="#collapse{{$apiario->getId()}}" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                <span class="font-weight-bold">Nome:</span> {{$apiario->getNome()}}
                                                <br>
                                                <span class="font-weight-bold">Localização:</span> {{$apiario->getLocalizacao()}}
                                            </a>
                                            <div class="float-right"><input type="checkbox" name="marcados[{{$apiario->getId()}}]"></div>
                                    </div>

                                    <div id="collapse{{$apiario->getId()}}" class="collapse" aria-labelledby="heading{{$apiario->getId()}}"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" value="{{$apiario->getId()}}" name="apiarios[]">
                                                <div class="col-md-6 text-truncate">
                                                    Melgueiras adicionadas
                                                    <input type="number" class="form-control" name="melgueirasAdd[{{$apiario->getId()}}]">
                                                </div>
                                                <div class="col-md-6 text-truncate">
                                                    Ninhos adicionados
                                                    <input type="number" class="form-control" name="ninhosAdd[{{$apiario->getId()}}]">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6 text-truncate">
                                                    Melgueiras removidas
                                                    <input type="number" class="form-control" name="melgueirasRmv[{{$apiario->getId()}}]">
                                                </div>
                                                <div class="col-md-6 text-truncate">
                                                    Ninhos removidos
                                                    <input type="number" class="form-control" name="ninhosRmv[{{$apiario->getId()}}]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                            </div>
                            @else
                                <p>Nenhum apiário foi cadastrado</p>
                            @endif
                            <div class="row my-2 text-right">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

