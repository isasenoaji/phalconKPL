<?php

namespace KPL\SAR\Domain\Models;


class Sar5 extends Sar {
    private $idMkKelas;

    public function __construct(SarId $id, $idMkKelas, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->idMkKelas = $idMkKelas;
        parent::__construct($id, $capaian, $sasaran, $pengisi, $isLocked);
    }

    public function idMkKelas() {
        return $this->idMkKelas;
    }
}