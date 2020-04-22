@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Galões cadastrardos</div>
                        <div class="float-right"><a href="{{route('cadastrarGalao')}}"
                                                    class="btn btn-sm btn-success">+</a></div>
                    </div>

                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                @if(sizeof($galoes) > 0)
                                    <?php $pesoTotal = 0; ?>
                                    @foreach($galoes as $galao)
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 font-weight-bolder">
                                                <?php $pesoTotal += $galao->getPeso();?>
                                                <div class="float-left">{{$galao->getTipo()}} - {{$galao->getPeso()}}
                                                    kg
                                                </div>
                                                <div class="float-right"><a
                                                        href="{{route('galao',['id'=>$galao->getId()])}}"
                                                        class="btn btn-sm btn-primary">Editar</a></div>
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <div class="text-center">
                                        <img src="{{asset('img/galoes.png')}}" width="100">
                                        <br>
                                        <h5>Não há galões cadastrados</h5>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="my-3">
                            @if(isset($pesoTotal))
                                Peso Total: {{$pesoTotal}}kg
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

