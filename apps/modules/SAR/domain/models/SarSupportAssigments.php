<?php

namespace KPL\SAR\Domain\Model;


class SarSupportAssigments {
    private $tipe;
    private $sarComponents;
    

    public function __construct($tipe) {
        $this->tipe = $tipe;
        $this->sarComponents = [];
    }

    public function addComponents(Sar $sar){
        array_push($this->sarComponents,$sar);
    }

    public function getComponents(){
        return $this->sarComponents;
    }
}