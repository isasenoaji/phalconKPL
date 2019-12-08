<?php

namespace KPL\SAR\Domain\Models;


class Sar5 {
    private $id;
    private $idMkKelas;
    private $capaian;
    private $sasaran;
    private $pengisi;
    private $isLocked;

    public function __construct(SarId $id, $idMkKelas, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->id = $id;
        $this->idMkKelas = $idMkKelas;
        $this->capaian = $capaian;
        $this->sasaran = $sasaran;
        $this->pengisi = $pengisi;
        $this->isLocked = $isLocked;
    }

    public function id() {
        return $this->id;
    }

    public function idMkKelas() {
        return $this->idMkKelas;
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