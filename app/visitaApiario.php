<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitaApiario extends Model
{
    protected $table = 'visita_apiario';
    protected $fillable = [
        'nomes','dataVisita'
    ];
    protected $primaryKey = 'id';
    public function getId(){
        return $this->id;
    }
    public function getNomes(){
        return $this->nomes;
    }
    public function getDataVisita(){
        return $this->dataVisita;
    }
    public function setNomes($nomes){
        $this->nomes = $nomes;
    }
    public function setDataVisita($data){
        $this->dataVisita = $data;
    }
    public function apiariosVisitados()
    {
        return $this->hasMany(apiariosVisitados::class,'visita','id')->get();
    }
    public $timestamps = true;
}
