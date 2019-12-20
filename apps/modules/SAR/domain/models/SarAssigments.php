<?php

namespace KPL\SAR\Domain\Model;


class SarAssigments {
    private $tipe;
    private $nip;
    private $sarComponents;
    

    public function __construct($tipe,$nip) {
        $this->tipe = $tipe;
        $this->nip = $nip;
        $this->sarComponents = [];
    }

    public function addComponents(Sar $sar){
        array_push($this->sarComponents,$sar);
    }

    public function getComponents(){
        return $this->sarComponents;
    }
}