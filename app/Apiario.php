<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apiario extends Model
{
    protected $table = 'apiarios';
    public $fillable = ['nome','localizacao','caixas','dataVisita','ninhos','melgueiras','ninhosNovos','melgueirasNovas','enxames'];
    //GETTERS
    public function getNome(){
    	return $this->nome;
    }
    public function getId(){
        return $this->id;
    }

    public function getLocalizacao(){
    	return $this->localizacao;
    }
    public function getMelgueiras(){
    	return $this->melgueiras;
    }
    public function getNinhos(){
        return $this->ninhos;
    }
    public function getEnxames(){
        return $this->enxames;
    }
    public function getMelgueirasNovas(){
        return $this->melgueirasNovas;
    }
    public function getNinhosNovos(){
        return $this->ninhosNovos;
    }
    public function getDataVisita(){
        return $this->dataVisita;
    }
    public function getDataVisitaFormat(){
        $data = new \DateTime($this->getDataVisita());
        return $data->format('d/m/Y');
    }
    //SETTERS
    public function setNome($nome){
    	$this->nome = $nome;
    }
    public function setLocalizacao($localizacao){
    	$this->localizacao = $localizacao;
    }
    public function setIdCaixas($idCaixas){
    	$this->caixas = $idCaixas;
    }
    public function setDataVisita($data){
        $this->dataVisita = $data;
    }
    public function setMelgueiras($melgueiras){
        $this->melgueiras = $melgueiras;
    }
    public function setNinhos($ninhos){
        $this->ninhos = $ninhos;
    }
    public function setEnxames($enxames){
        $this->enxames = $enxames;
    }
    public function setMelgueirasNovas($melgueiras){
        $this->melgueirasNovas = $melgueiras;
    }
    public function setNinhosNovos($ninhos){
        $this->ninhosNovos = $ninhos;
    }


}
