<?php

namespace KPL\SAR\Domain\Model;


class Sar2 extends Sar {
    private $jenjang;
    private $fakultas;
    

    public function __construct($id, $jenjang,$periode, $fakultas, $capaian, $sasaran, $pengisi, $IsLocked = false) {
        $this->idJenjang = $jenjang;
        $this->idFakultas = $fakultas;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

    public function generateToArray(){
        return array("id" => $this->id,
                    "jenjang" => $this->jenjang,
                    "periode" => $this->periode,
                    "fakultas"=> $this->fakultas,
                    "sasaran" => $this->sasaran,
                    "capaian" => $this->capaian,
                    "pengisi" => $this->pengisi,
                    "isLocked" => $this->isLocked
        );
    }
}