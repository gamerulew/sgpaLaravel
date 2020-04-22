<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apiariosVisitados extends Model
{
    protected $table = 'apiarios_visitados';
    protected $fillable = [
        'apiario', 'visita', 'melgueirasAdd', 'ninhosAdd', 'melgueirasRmv', 'ninhosRmv'
    ];
    protected $primaryKey = 'id';

    public function getId()
    {
        return $this->id;
    }

    public function getApiario()
    {
        return $this->apiario;
    }

    public function getVisita()
    {
        return $this->visita;
    }

    public function getMelgueirasAdd()
    {
        return $this->melgueirasAdd;
    }

    public function getNinhosAdd()
    {
        return $this->ninhosAdd;
    }

    public function getMelgueirasRmv()
    {
        return $this->melgueirasRmv;
    }

    public function getNinhosRmv()
    {
        return $this->ninhosRmv;
    }

    public function setApiario($apiario)
    {
        $this->apiario = $apiario;
    }

    public function setVisita($visita)
    {
        $this->visita = $visita;
    }

    public function setMelgueirasAdd($melgueiras)
    {
        $this->melgueirasAdd = $melgueiras;
    }

    public function setNinhosAdd($ninhos)
    {
        $this->ninhosAdd = $ninhos;
    }

    public function setMelgueirasRmv($melgueiras)
    {
        $this->melgueirasRmv = $melgueiras;
    }

    public function setNinhosRmv($ninhos)
    {
        $this->ninhosRmv = $ninhos;
    }

    public function visita()
    {
        return $this->belongsTo(visitaApiario::class, 'visita', 'id')->get();
    }

    public function apiario()
    {
        return $this->hasOne(Apiario::class,'id','apiario')->get();
    }

    public $timestamps = true;
}
