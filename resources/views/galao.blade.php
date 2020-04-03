@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">Editar apiário</div>
                        <div class="float-right"><a href="{{route('galoes')}}" class="btn btn-sm btn-success">Voltar</a></div>
                    </div>

                    <div class="card-body">
                        @if($galao != null)
                            @csrf
                            <form action="{{route('editarGalaoPost')}}" method="post">
                                <input type="hidden" name="id" id="id" value="{{$galao->getId()}}">
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
                                        <input type="text" class="form-control" name="tipo" id="tipo" value="{{$galao->getTipo()}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Peso (kg)</label>
                                        <input type="number" class="form-control" name="peso" id="peso" value="{{$galao->getPeso()}}" required>
                                    </div>
                                </div>
                                <div class="row my-2 text-right">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Editar</button>
                                        <a href="{{route('deletarGalao',['id'=>$galao->getId()])}}" type="submit" class="btn btn-danger">Deletar</a>
                                    </div>
                                </div>
                            </form>
                        @else
                            Galão não encontrado
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

