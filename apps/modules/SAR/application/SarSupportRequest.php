<?php

namespace KPL\SAR\Application;

class SarSupportRequest
{
    public $TipeSar;
    public $Param;

    public function __construct($TipeSar,$Param)
    {
        $this->TipeSar = $TipeSar;
        $this->Param = $Param;
    }


}       
