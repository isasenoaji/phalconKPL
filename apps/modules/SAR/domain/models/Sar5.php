<?php

namespace KPL\SAR\Domain\Model;


class Sar5 extends Sar {
    private $MkKelas;
    private $jurusan;
    private $jenjang;
    private $rmk;
    private $sasaran_rmk;
    private $capaian_rmk;
    private $kelas;

    public function __construct($id, $periode, $MkKelas, $kelas, $jenjang,$jurusan, $rmk, $sasaran_rmk, $capaian_rmk, $capaian, $sasaran, $pengisi, $IsLocked = false,  $IsAccess) {
        $this->MkKelas = $MkKelas;
        $this->kelas = $kelas;
        $this->jurusan = $jurusan;
        $this->rmk = $rmk;
        $this->sasaran_rmk = $sasaran_rmk;
        $this->capaian_rmk = $capaian_rmk;
        $this->jenjang = $jenjang;

        parent::__construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked, $IsAccess);
    }

    public function generateToArray(){
        return array("id" => $this->id,
                    "jenjang" => $this->jenjang,
                    "periode" => $this->periode,
                    "jurusan"=> $this->jurusan,
                    "MkKelas" => $this->MkKelas,
                    "kelas" => $this->kelas,
                    "sasaran" => $this->sasaran,
                    "capaian" => $this->capaian,
                    "rmk" => $this->rmk,
                    "sasaran_rmk" => $this->sasaran_rmk,
                    "capaian_rmk" => $this->capaian_rmk,
                    "pengisi" => $this->pengisi,
                    "IsLocked" => $this->IsLocked,
                    "IsAccess" => $this->IsAccess
        );
    }

}