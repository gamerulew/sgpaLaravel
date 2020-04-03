<?php

namespace App\Http\Controllers;

use App\Galao;
use Illuminate\Http\Request;

class GalaoController extends Controller
{
    public  function criar(Request $request){
        $galao = new Galao();
        $galao->setPeso($request->peso);
        $galao->setTipo($request->tipo);
        return $galao->save();
    }
    public  function editar(Request $request){
        $galao = Galao::find($request->id);
        $galao->setPeso($request->peso);
        $galao->setTipo($request->tipo);
        return $galao->save();
    }
    public  function deletar($id){
        $galao = Galao::find($id);
        return $galao->delete();
    }
    public function  getPesoTotal(){
        $peso = BD::table('galoes')->select(BD::raw('count(galoes.peso) as peso'))->get();
        print_r($peso);
        return;
    }
    public function getGaloes(){
        return Galao::all();
    }
    public function find($id){
        return Galao::find($id);
    }
}
