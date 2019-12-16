<?php

namespace KPL\SAR\Domain\Model;


class Sar1 extends Sar {
    public $idJenjang;
    public $idPeriode;

    public function __construct($id, $idJenjang, $idPeriode, $capaian, $sasaran, $pengisi, $isLocked = false) {
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

    public function generateToArray(){
        return array("id" => $this->id,
                    "idJenjang" => $this->idJenjang,
                    "idPeriode" => $this->idPeriode,
                    "sasaran" => $this->sasaran,
                    "capaian" => $this->capaian,
                    "pengisi" => $this->pengisi,
                    "isLocked" => $this->isLocked
        );
    }
}