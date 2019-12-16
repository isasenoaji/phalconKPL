<?php

namespace KPL\SAR\Application;

use KPL\SAR\domain\models\sar;

class SarSupportResponse
{
    public $SarAssigment;

    public function __construct()
    {
        $this->SarAssigment = array();
    }

    public function addSarAssigment(array $component){
        array_push($this->SarAssigment, $component);
    }

}