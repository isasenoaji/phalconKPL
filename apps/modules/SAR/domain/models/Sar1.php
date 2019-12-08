<?php

namespace KPL\SAR\Domain\Models;


class Sar1 extends Sar {
    private $idJenjang;
    private $idPeriode;

    public function __construct(SarId $id, $idJenjang, $idPeriode, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->idJenjang = $idJenjang;
        $this->idPeriode = $idPeriode;
        parent::__construct($id, $capaian, $sasaran, $pengisi, $isLocked);
    }

    public function idJenjang() {
        return $this->idJenjang;
    }

    public function idPeriode() {
        return $this->idPeriode;
    }
}