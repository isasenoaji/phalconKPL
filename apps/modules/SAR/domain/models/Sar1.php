<?php

namespace KPL\SAR\Domain\Model;


class Sar1 extends Sar {
    public $jenjang;
    

    public function __construct($id, $jenjang, $periode, $capaian, $sasaran, $pengisi, $IsLocked = false) {
        $this->jenjang = $jenjang;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

    public function generateToArray(){
        return array("id" => $this->id,
                    "jenjang" => $this->jenjang,
                    "periode" => $this->periode,
                    "sasaran" => $this->sasaran,
                    "capaian" => $this->capaian,
                    "pengisi" => $this->pengisi,
                    "IsLocked" => $this->IsLocked
        );
    }
}