<?php


namespace KPL\SAR\Domain\Model;


class Sar {
    public $id;
    public $periode;
    public $capaian;
    public $sasaran;
    public $pengisi;
    public $IsLocked;

    protected function __construct($id,$periode, $capaian, $sasaran, $pengisi, $IsLocked) {
        $this->id = $id;
        $this->periode = $periode;
        $this->capaian = $capaian;
        $this->sasaran = $sasaran;
        $this->pengisi = $pengisi;
        $this->IsLocked = $IsLocked;
    }

    public function id() {
        return $this->id;
    }

    public function capaian() {
        return $this->capaian;
    }

    public function sasaran() {
        return $this->sasaran;
    }

    public function pengisi() {
        return $this->pengisi;
    }

    public function isLocked() {
        return $this->isLocked;
    }

    public function lockSar() {
        $this->isLocked = true;
    }
}