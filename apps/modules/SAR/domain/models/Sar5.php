<?php

namespace KPL\SAR\Domain\Model;


class Sar5 extends Sar {
    private $MkKelas;

    public function __construct($id, $idMkKelas, $capaian, $sasaran, $pengisi, $IsLocked = false) {
        $this->idMkKelas = $idMkKelas;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

}