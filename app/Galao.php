<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galao extends Model
{
    protected $table = 'galoes';
    protected $fillable = [
        'tipo','peso'
    ];
    public function getTipo(){
        return $this->tipo;
    }
    public function getId(){
        return $this->id;
    }
    public function  getPeso(){
        return $this->peso;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function  setPeso($peso){
        $this->peso = $peso;
    }
    public $timestamps = true;
}
