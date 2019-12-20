<?php

namespace KPL\SAR\Application;

class SetOpenAccessRequest
{
    public $IdSar;
    public $NIP;

    public function __construct($IdSar,$NIP)
    {
        $this->IdSar = $IdSar;
        $this->NIP = $NIP;
    }

}       
