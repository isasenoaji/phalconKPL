<?php

namespace KPL\SAR\Domain\Models;


class Sar1 {
    private $id;
    private $idJenjang;
    private $idPeriode;
    private $capaian;
    private $sasaran;
    private $pengisi;
    private $isLocked;

    public function __construct(SarId $id, $idJenjang, $idPeriode, $capaian, $sasaran = 0, $pengisi, $isLocked = false) {
        $this->id = $id;
        $this->idJenjang = $idJenjang;
        $this->idPeriode = $idPeriode;
        $this->capaian = $capaian;
        $this->sasaran = $sasaran;
        $this->pengisi = $pengisi;
        $this->isLocked = $isLocked;
    }

    public function id() {
        return $this->id;
    }

    public function idJenjang() {
        return $this->idJenjang;
    }

    public function idPeriode() {
        return $this->idPeriode;
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