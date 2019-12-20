<?php

namespace KPL\SAR\Domain\Model;

class SasaranSarValue
{
    private $TipeSar;
    private $NIP;
    private $idSar;
    private $sasaran;

    public function __construct($TipeSar,$NIP,$idSar,$sasaran)
    {
        $this->TipeSar = $TipeSar;
        $this->NIP = $NIP;
        $this->idSar = $idSar;
        $this->sasaran = $sasaran;
    }

    public function CheckSasaran(){
        $value = $this->sasaran;
        if($value <= 0 || $value >= 4){
            return false;
        }
        else {
            return true;
        }
    }

    public function TipeSar(){
        return $this->TipeSar();
    }

    public function NIP(){
        return $this->NIP;
    }

    public function idSar(){
        return $this->idSar;
    }

    public function Sasaran(){
        return $this->sasaran;
    }


}   