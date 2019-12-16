<?php

namespace KPL\SAR\Application;

use KPL\SAR\domain\models\sar;

class SarMasterResponse
{
    public $TIPE;
    public $SarAssigment;


    public function __construct()
    {
        // $this->SarAssigment = $SarComponents;
        // foreach($SarComponents as $component){

        // }
        // $this->Tipe=$tipe;
        $this->SarAssigment = array();
    }

    public function addSarAssigment(array $component){
        array_push($this->SarAssigment, $component);
    }

}