@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Editar visita</div>
                        <div class="float-right"><a href="{{route('visitas')}}"
                                                    class="btn btn-sm btn-success">Voltar</a></div>
                    </div>

                    <div class="card-body">
                        @if($visita != null)
                            <form action="{{route('editarVisitaPost')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$visita->getId()}}">

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
                                        <input type="text" class="form-control" name="nomes" id="nomes"
                                               value="{{$visita->getNomes()}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Data da visita</label>
                                        <input type="date" class="form-control" name="dataVisita" id="dataVisita"
                                               value="{{$visita->getDataVisita()}}" required>
                                    </div>
                                </div>
                                <hr>
                                <h6 class="font-weight-bold">Apiários</h6>
                                @if(sizeof($apiarios) > 0)

                                    <div class="accordion" id="accordionExample">
                                        @foreach($apiarios as $apiario)
                                            <div class="card">
                                                <?php $possui = false; ?>

                                                @foreach($visita->apiariosVisitados() as $apiarioV)

                                                    @if($apiario->getId() == $apiarioV->getApiario())
                                                        <?php $possui = true; ?>
                                                        <input type="hidden" name="idApiarios[{{$apiario->getId()}}]" value="{{$apiarioV->getId()}}">
                                                        <div class="card-header" id="heading{{$apiario->getId()}}">
                                                            <a type="button" data-toggle="collapse"
                                                               data-target="#collapse{{$apiario->getId()}}"
                                                               aria-expanded="false"
                                                               aria-controls="collapseOne">
                                                                <span
                                                                    class="font-weight-bold">Nome:</span> {{$apiario->getNome()}}
                                                                <br>
                                                                <span
                                                                    class="font-weight-bold">Localização:</span> {{$apiario->getLocalizacao()}}
                                                            </a>
                                                            <div class="float-right"><input type="checkbox" checked
                                                                                            name="marcados[{{$apiario->getId()}}]">
                                                            </div>
                                                        </div>
                                                        <div id="collapse{{$apiario->getId()}}" class="collapse"
                                                             aria-labelledby="heading{{$apiario->getId()}}"
                                                             data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <input type="hidden" value="{{$apiario->getId()}}"
                                                                           name="apiarios[]">
                                                                    <div class="col-md-6 text-truncate">
                                                                        Melgueiras adicionadas
                                                                        <input type="number" class="form-control"
                                                                               name="melgueirasAdd[{{$apiario->getId()}}]"
                                                                               value="{{$apiarioV->getMelgueirasAdd()}}">
                                                                    </div>
                                                                    <div class="col-md-6 text-truncate">
                                                                        Ninhos adicionados
                                                                        <input type="number" class="form-control"
                                                                               name="ninhosAdd[{{$apiario->getId()}}]"
                                                                               value="{{$apiarioV->getNinhosAdd()}}">
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-6 text-truncate">
                                                                        Melgueiras removidas
                                                                        <input type="number" class="form-control"
                                                                               name="melgueirasRmv[{{$apiario->getId()}}]"
                                                                               value="{{$apiarioV->getMelgueirasRmv()}}">
                                                                    </div>
                                                                    <div class="col-md-6 text-truncate">
                                                                        Ninhos removidos
                                                                        <input type="number" class="form-control"
                                                                               name="ninhosRmv[{{$apiario->getId()}}]"
                                                                               value="{{$apiarioV->getNinhosRmv()}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @if(!$possui)
                                                    <div class="card-header" id="heading{{$apiario->getId()}}">
                                                        <a type="button" data-toggle="collapse"
                                                           data-target="#collapse{{$apiario->getId()}}"
                                                           aria-expanded="false"
                                                           aria-controls="collapseOne">
                                                                <span
                                                                    class="font-weight-bold">Nome:</span> {{$apiario->getNome()}}
                                                            <br>
                                                            <span
                                                                class="font-weight-bold">Localização:</span> {{$apiario->getLocalizacao()}}
                                                        </a>
                                                        <div class="float-right"><input type="checkbox" name="marcados[{{$apiario->getId()}}]">
                                                        </div>
                                                    </div>
                                                    <div id="collapse{{$apiario->getId()}}" class="collapse"
                                                         aria-labelledby="heading{{$apiario->getId()}}"
                                                         data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <input type="hidden" value="{{$apiario->getId()}}"
                                                                       name="apiarios[]">
                                                                <div class="col-md-6 text-truncate">
                                                                    Melgueiras adicionadas
                                                                    <input type="number" class="form-control"
                                                                           name="melgueirasAdd[{{$apiario->getId()}}]">
                                                                </div>
                                                                <div class="col-md-6 text-truncate">
                                                                    Ninhos adicionados
                                                                    <input type="number" class="form-control"
                                                                           name="ninhosAdd[{{$apiario->getId()}}]">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6 text-truncate">
                                                                    Melgueiras removidas
                                                                    <input type="number" class="form-control"
                                                                           name="melgueirasRmv[{{$apiario->getId()}}]">
                                                                </div>
                                                                <div class="col-md-6 text-truncate">
                                                                    Ninhos removidos
                                                                    <input type="number" class="form-control"
                                                                           name="ninhosRmv[{{$apiario->getId()}}]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif


                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Nenhum apiário foi cadastrado</p>
                                @endif
                                <div class="row my-2 text-right">
                                    <div class="col-md-12">
                                        <a href="{{route('deletarVisita',['id'=>$visita->getId()])}}" class="btn btn-danger">Deletar</a>
                                        <button type="submit" class="btn btn-success">Editar</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            Visita não encontrado
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

