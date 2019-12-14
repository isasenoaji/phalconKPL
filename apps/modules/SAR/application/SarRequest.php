<?php

namespace KPL\SAR\Application;

class SarRequest
{
    public $tipeSar;
    public $NIP;

    public function __construct($NIP,$jabatan)
    {
        $this->NIP = $NIP;
        $this->tipeSar = $jabatan-1;
    }


}