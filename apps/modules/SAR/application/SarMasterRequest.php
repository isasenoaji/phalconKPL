<?php

namespace KPL\SAR\Application;

class SarMasterRequest
{
    public $TipeSAR;
    public $NIP;

    public function __construct($NIP,$tipe)
    {
        $this->NIP = $NIP;
        $this->Tipe = $tipe;
    }


}