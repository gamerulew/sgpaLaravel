<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apiario;

class ApiarioController extends Controller
{
    public function criar(Request $request)
    {
        $apiario = new Apiario();
        $apiario->setNome($request->nome);
        $apiario->setLocalizacao($request->localizacao);
        $apiario->setDataVisita($request->dataVisita);
        $apiario->setNinhos($request->ninhos);
        $apiario->setMelgueiras($request->melgueiras);
        $apiario->setEnxames($request->enxames);
        $apiario->setNinhosNovos($request->ninhosNovos);
        $apiario->setMelgueirasNovas($request->melgueirasNovas);
        return $apiario->save();
    }

    public function getApiarios()
    {
        return Apiario::all();
    }

    public function find($id)
    {
        $apiario = Apiario::find($id);
        return $apiario;
    }

    public function editar(Request $request)
    {
        $apiario = Apiario::find($request->id);
        $apiario->setNome($request->nome);
        $apiario->setLocalizacao($request->localizacao);
        $apiario->setDataVisita($request->dataVisita);
        $apiario->setNinhos($request->ninhos);
        $apiario->setMelgueiras($request->melgueiras);
        $apiario->setEnxames($request->enxames);
        $apiario->setNinhosNovos($request->ninhosNovos);
        $apiario->setMelgueirasNovas($request->melgueirasNovas);
        return $apiario->save();
    }

    public function deletar($id)
    {
        $apiario = Apiario::find($id);
        return $apiario->delete();
    }

}
