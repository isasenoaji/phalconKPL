<?php

namespace KPL\SAR\Application;

class SarSupportRequest
{
    public $tipeSar;
    public $NIP;

    public function __construct($NIP,$jabatan)
    {
        $this->NIP = $NIP;
        $this->tipeSar = $jabatan;
    }


}