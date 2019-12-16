<?php

namespace KPL\SAR\Application;

class SarSupportRequest
{
    public $TipeSar;

    public function __construct($TipeSar)
    {
        $this->TipeSar = $TipeSar;
    }


}