<?php

namespace KPL\SAR\Domain\Model;


class Sar4 extends Sar {
    private $rmk;
    private $jurusan;
    private $sasaran_jurusan;
    private $capaian_jurusan;

    public function __construct($id, $periode, $jenjang, $rmk, $sasaran, $capaian, $jurusan, $sasaran_jurusan, $capaian_jurusan, $pengisi, $IsLocked = false) {
        $this->rmk = $rmk;
        $this->jenjang = $jenjang;
        $this->jurusan = $jurusan;
        $this->sasaran_jurusan = $sasaran_jurusan;
        $this->capaian_jurusan = $capaian_jurusan;
        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked);
    }

    public function generateToArray(){
        return array("id" => $this->id,
                    "jenjang" => $this->jenjang,
                    "periode" => $this->periode,
                    "jurusan"=> $this->jurusan,
                    "sasaran" => $this->sasaran,
                    "capaian" => $this->capaian,
                    "rmk" => $this->rmk,
                    "sasaran_jurusan" => $this->sasaran_jurusan,
                    "capaian_jurusan" => $this->capaian_jurusan,
                    "pengisi" => $this->pengisi,
                    "IsLocked" => $this->IsLocked
        );
    }

}