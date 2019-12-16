<?php

namespace KPL\SAR\Domain\Model;


class Sar3 extends Sar {
    private $jenjang;
    private $jurusan;
   

    public function __construct($id, $jenjang,$periode, $jurusan, $capaian, $sasaran, $pengisi, $IsLocked = false) {
        $this->idJenjang = $jenjang;
        $this->idJurusan = $jurusan;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

    public function idJenjang() {
        return $this->idJenjang;
    }

    public function idJurusan() {
        return $this->idJurusan;
    }
}