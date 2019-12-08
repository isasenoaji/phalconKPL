<?php

namespace KPL\SAR\Domain\Models;


class Sar4 extends Sar {
    private $idRmk;

    public function __construct($id, $idRmk, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->idRmk = $idRmk;
        parent::__construct($id, $capaian, $sasaran, $pengisi, $isLocked);
    }

    public function idRmk() {
        return $this->idRmk;
    }
}