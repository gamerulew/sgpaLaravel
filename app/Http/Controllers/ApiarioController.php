<?php

namespace App\Http\Controllers;

use App\apiariosVisitados;
use App\visitaApiario;
use Illuminate\Http\Request;
use App\Apiario;
use Illuminate\Support\Facades\DB;

class ApiarioController extends Controller
{
    public function criar(Request $request)
    {
        $apiario = new Apiario();
        $apiario->setNome($request->nome);
        $apiario->setLocalizacao($request->localizacao);
        $apiario->setNinhos($request->ninhos);
        $apiario->setMelgueiras($request->melgueiras);
        $apiario->setEnxames($request->enxames);
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
        $apiario->setNinhos($request->ninhos);
        $apiario->setMelgueiras($request->melgueiras);
        $apiario->setEnxames($request->enxames);
        return $apiario->save();
    }

    public function deletar($id)
    {
        $apiario = Apiario::find($id);
        return $apiario->delete();
    }

    public function cadastrarVisita(Request $request)
    {
        $visitaApiario = new visitaApiario();
        $visitaApiario->setDataVisita($request->dataVisita);
        $visitaApiario->setNomes($request->nomes);
        $visitaApiario->save();
        $visitaId = $visitaApiario->getId();
        if ($visitaId != null && $visitaApiario->getId() > 0) {
            return $this->cadastrarApiariosVisitados($request, $visitaId);
        }
        return false;
    }

    public function cadastrarApiariosVisitados(Request $request, $visitaId)
    {
        foreach ($request->apiarios as $apiario) {
            if (isset($request->marcados[$apiario])) {
                $apiarioVisitado = new apiariosVisitados();
                $apiarioVisitado->setApiario($apiario);
                $apiarioVisitado->setVisita($visitaId);
                $apiarioVisitado->setMelgueirasAdd($request->melgueirasAdd[$apiario]);
                $apiarioVisitado->setNinhosAdd($request->ninhosAdd[$apiario]);
                $apiarioVisitado->setMelgueirasRmv($request->melgueirasRmv[$apiario]);
                $apiarioVisitado->setNinhosRmv($request->ninhosRmv[$apiario]);
                $apiarioVisitado->save();
            }
        }
        return true;
    }

    public function editarVisita(Request $request)
    {
        $visitaApiario = visitaApiario::find($request->id);
        $visitaApiario->setDataVisita($request->dataVisita);
        $visitaApiario->setNomes($request->nomes);
        $condicao = $visitaApiario->save();
        if ($condicao) {
            return $this->editarApiariosVisitados($request);
        }
        return false;
    }

    public function editarApiariosVisitados(Request $request)
    {
        DB::table('apiarios_visitados')->where('visita', '=', $request->id)->delete();
        foreach ($request->apiarios as $apiario) {
            if (isset($request->marcados[$apiario])) {
                $apiarioVisitado = new apiariosVisitados();
                $apiarioVisitado->setApiario($apiario);
                $apiarioVisitado->setVisita($request->id);
                $apiarioVisitado->setMelgueirasAdd($request->melgueirasAdd[$apiario]);
                $apiarioVisitado->setNinhosAdd($request->ninhosAdd[$apiario]);
                $apiarioVisitado->setMelgueirasRmv($request->melgueirasRmv[$apiario]);
                $apiarioVisitado->setNinhosRmv($request->ninhosRmv[$apiario]);
                $apiarioVisitado->save();
            }
        }
        return true;
    }

    public function getVisitasPorApiario($idApiario)
    {

        $visitas = DB::table('visita_apiario', 'va')->select('va.*')
            ->leftJoin('apiarios_visitados', 'va.id', '=', 'apiarios_visitados.visita')
            ->where('apiarios_visitados.apiario', '=', $idApiario)
            ->orderBy('va.dataVisita', 'desc')->get();
        for ($i = 0; $i < sizeof($visitas); $i++) {
            $visita = visitaApiario::find($visitas[$i]->id);
            $visitas[$i] = $visita;
        }
        return $visitas;
    }

    public function getVisita($id)
    {
        return visitaApiario::find($id);
    }

    public function getVisitas()
    {
        $visitas = visitaApiario::all();
        return $visitas;
    }
    public function deletarVisita($id){
        if(visitaApiario::find($id)->delete()){
            return $this->deletarApiariosVisitados($id);
        }
    }
    public function deletarApiariosVisitados($id){
        return DB::table('apiarios_visitados')->where('visita', '=', $id)->delete();;
    }

}
