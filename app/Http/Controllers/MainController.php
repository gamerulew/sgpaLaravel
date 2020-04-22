<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
   public function home(){
    return view('home');
}
//Usuário
public function __construct(UserController $userController, ApiarioController $apiarioController,GalaoController $galaoController)
{
    $this->userController = $userController;
    $this->apiarioController = $apiarioController;
    $this->galaoController = $galaoController;
}
public function cadastrarUsuario(Request $request){
    if($this->userController->criar($request)){
        return redirect()->route('login');
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao cadastrar usuário']);
    }
}
public  function logarUsuario(Request $request){
    if($this->userController->logar($request)){
        return redirect()->route('home');
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao logar']);
    }
}
public function deslogarUsuario(){
    if($this->userController->deslogar()){
        return redirect()->route('login');
    }
    return redirect()->back();
}
//Apiário
public function apiarios(){
    $apiarios = $this->apiarioController->getApiarios();
    $visitas = [];
    foreach ($apiarios as $apiario){
        $visitas[$apiario->getId()] = $this->apiarioController->getVisitasPorApiario($apiario->getId());
    }
    return view('apiarios',compact('apiarios','visitas'));
}
public function apiario($id){
    $apiario = $this->apiarioController->find($id);
    return view('apiario',compact('apiario'));
}
public function editarApiario(Request $request){
    if($this->apiarioController->editar($request)){
       return redirect()->back();
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao editar apiário']);
    }
}
public function cadastrarApiario(Request $request){
    if($this->apiarioController->criar($request)){
        return redirect()->route('apiarios');
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao cadastrar apiário']);
    }
}
public function formCadastrarApiario(){
    return view('cadastrarApiario');
}
public function deletarApiario(Request $request){
    if($this->apiarioController->deletar($request->id)){
        return redirect()->route('apiarios');
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao deletar apiário']);
    }
}
//Galões
public function galoes(){
    $galoes = $this->galaoController->getGaloes();
    return view('galoes',compact('galoes'));
}
public function galao($id){
    $galao = $this->galaoController->find($id);
    return view('galao',compact('galao'));
}
public function formCadastrarGalao(){
       return view('cadastrarGalao');
}
public function cadastrarGalao(Request $request){
    if($this->galaoController->criar($request)){
        return redirect()->route('galoes');
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao cadastrar galão']);
    }
}
    public function editarGalao(Request $request){
        if($this->galaoController->editar($request)){
            return redirect()->back();
        }else{
            return redirect()->back()->with(['erro'=>'Falha ao editar galão']);
        }
    }
public function deletarGalao(Request $request){
       if($this->galaoController->deletar($request->id)){
           return redirect()->route('galoes');
       }else{
           return redirect()->back()->with(['erro'=>'Falha ao deletar galão']);
       }
}
//Visita Apiário
public function visitas(){
       $visitas = $this->apiarioController->getVisitas();
       $apiarios = $this->apiarioController->getApiarios();
       return view('visitas',compact('visitas','apiarios'));
}
public function visita($id){
       $visita = $this->apiarioController->getVisita($id);
       $apiarios = $this->apiarioController->getApiarios();
       return view('visita',compact('visita','apiarios'));
}
public function editarVisita(Request $request){
    if($this->apiarioController->editarVisita($request)){
        return redirect()->back();
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao editar visita']);
    }
}
public function formCadastrarVisita(){
       $apiarios = $this->apiarioController->getApiarios();
       return view('cadastrarVisita',compact('apiarios'));
}
public function cadastrarVisita(Request $request){
    if($this->apiarioController->cadastrarVisita($request)){
        return redirect()->back();
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao cadsatrar visita']);
    }
}
public function deletarVisita(Request $request){
    if($this->apiarioController->deletarVisita($request->id)){
        return redirect()->route('visitas');
    }else{
        return redirect()->back()->with(['erro'=>'Falha ao deletar visita']);
    }
}

}
