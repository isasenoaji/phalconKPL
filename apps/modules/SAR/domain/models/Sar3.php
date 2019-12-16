<?php

namespace KPL\SAR\Domain\Model;


class Sar3 extends Sar {
    private $idJenjang;
    private $idJurusan;

    public function __construct($id, $idJenjang, $idJurusan, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->idJenjang = $idJenjang;
        $this->idJurusan = $idJurusan;
        parent::__construct($id, $capaian, $sasaran, $pengisi, $isLocked);
    }

    public function idJenjang() {
        return $this->idJenjang;
    }

    public function idJurusan() {
        return $this->idJurusan;
    }
}