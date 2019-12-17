<?php

namespace KPL\SAR\Application;

class SetSasaranSarRequest
{
    public $TipeSar;
    public $NIP;
    public $idSar;
    public $sasaran;

    public function __construct($TipeSar,$NIP,$idSar,$sasaran)
    {
        $this->TipeSar = $TipeSar;
        $this->NIP = $NIP;
        $this->idSar = $idSar;
        $this->sasaran = $sasaran;
    }


}       
