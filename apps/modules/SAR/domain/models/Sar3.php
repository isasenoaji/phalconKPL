<?php

namespace KPL\SAR\domain\models;


class Sar3 {
    private $id;
    private $idJenjang;
    private $idJurusan;
    private $capaian;
    private $sasaran;
    private $pengisi;
    private $isLocked;

    public function __construct(SarId $id, $idJenjang, $idJurusan, $capaian, $sasaran, $pengisi, $isLocked = false) {
        $this->id = $id;
        $this->idJenjang = $idJenjang;
        $this->idJurusan = $idJurusan;
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

    public function idJurusan() {
        return $this->idJurusan;
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