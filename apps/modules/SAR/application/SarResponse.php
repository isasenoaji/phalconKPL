<?php

namespace KPL\SAR\Application;

use KPL\SAR\domain\models\sar;

class SarResponse
{
    public $SarAssigment;


    public function __construct(array $SarComponents)
    {
        $this->SarAssigment = $SarComponents;
    }

}