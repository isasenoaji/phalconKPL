<?php

namespace KPL\SAR\Application;

class SetLockSarRequest
{
    public $TipeSar;
    public $NIP;
    public $idSar;

    public function __construct($TipeSar,$NIP,$idSar)
    {
        $this->TipeSar = $TipeSar;
        $this->NIP = $NIP;
        $this->idSar = $idSar;
    }

}       
