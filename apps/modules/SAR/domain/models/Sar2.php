<?php

namespace KPL\SAR\Domain\Models;


class Sar2 extends Sar {
    private $idJenjang;
    private $idFakultas;

    public function __construct($id, $idJenjang, $idFakultas, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->idJenjang = $idJenjang;
        $this->idFakultas = $idFakultas;
        parent::__construct($id, $capaian, $sasaran, $pengisi, $isLocked);
    }

    public function idJenjang() {
        return $this->idJenjang;
    }

    public function idFakultas() {
        return $this->idFakultas;
    }
}