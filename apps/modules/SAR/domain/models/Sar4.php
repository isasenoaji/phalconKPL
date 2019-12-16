<?php

namespace KPL\SAR\Domain\Model;


class Sar4 extends Sar {
    private $rmk;

    public function __construct($id, $idRmk, $capaian, $sasaran, $pengisi, $IsLocked = false) {
        $this->rmk = $rmk;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

}