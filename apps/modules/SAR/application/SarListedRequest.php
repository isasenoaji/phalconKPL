<?php

namespace KPL\SAR\Application;

class SarListedRequest
{
    public $nip;

    public function __construct($nip)
    {
        $this->nip = $nip;
    }

}