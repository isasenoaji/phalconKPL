<?php

namespace KPL\SAR\Domain\Model;


class Sar3 extends Sar {
    private $jenjang;
    private $jurusan;
   

    public function __construct($id, $jenjang,$periode, $jurusan, $sasaran, $capaian, $pengisi, $IsLocked = false) {
        $this->jenjang = $jenjang;
        $this->jurusan = $jurusan;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

    public function generateToArray(){
        return array("id" => $this->id,
                    "jenjang" => $this->jenjang,
                    "periode" => $this->periode,
                    "jurusan"=> $this->jurusan,
                    "sasaran" => $this->sasaran,
                    "capaian" => $this->capaian,
                    "pengisi" => $this->pengisi,
                    "IsLocked" => $this->IsLocked
        );
    }
}