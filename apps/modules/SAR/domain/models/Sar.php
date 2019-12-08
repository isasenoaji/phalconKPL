<?php


namespace KPL\SAR\domain\models;


class Sar {
    private $id;
    private $capaian;
    private $sasaran;
    private $pengisi;
    private $isLocked;

    protected function __construct($id, $capaian, $sasaran, $pengisi, $isLocked) {
        $this->id = $id;
        $this->capaian = $capaian;
        $this->sasaran = $sasaran;
        $this->pengisi = $pengisi;
        $this->isLocked = $isLocked;
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