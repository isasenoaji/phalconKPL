<?php

namespace KPL\SAR\Application;

use KPL\SAR\domain\models\sar;

class SarSupportResponse
{
    public $TIPE;
    public $SarAssigment;


    public function __construct(array $SarComponents,$tipe)
    {
        $this->SarAssigment = $SarComponents;
        $this->TIPE=$tipe;

    }

}