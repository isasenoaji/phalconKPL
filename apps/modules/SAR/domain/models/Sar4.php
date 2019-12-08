<?php

namespace KPL\SAR\Domain\Models;


class Sar4 {
    private $id;
    private $idRmk;
    private $capaian;
    private $sasaran;
    private $pengisi;
    private $isLocked;

    public function __construct(SarId $id, $idRmk, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->id = $id;
        $this->idRmk = $idRmk;
        $this->capaian = $capaian;
        $this->sasaran = $sasaran;
        $this->pengisi = $pengisi;
        $this->isLocked = $isLocked;
    }

    public function id() {
        return $this->id;
    }

    public function idRmk() {
        return $this->idRmk;
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