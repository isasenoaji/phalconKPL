<?php

namespace KPL\SAR\Application;

use KPL\SAR\domain\models\sar;

class SarMasterResponse
{
    public $tipe;
    public $SarAssigment;


    public function __construct(array $SarComponents,$tipe)
    {
        $this->SarAssigment = $SarComponents;
        $this->tipe=$tipe;

    }

}