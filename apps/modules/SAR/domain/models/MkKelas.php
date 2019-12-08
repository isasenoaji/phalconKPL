<?php


namespace KPL\SAR\Domain\Models;


class MkKelas {
    private $id;
    private $nama;
    private $idRmk;
    private $kelas;

    public function __construct($id, $nama, $idRmk, $kelas) {
        $this->id = $id;
        $this->nama = $nama;
        $this->idRmk = $idRmk;
        $this->kelas = $kelas;
    }

    public function id() {
        return $this->id;
    }

    public function nama() {
        return $this->nama;
    }

    public function idRmk() {
        return $this->idRmk;
    }

    public function kelas() {
        return $this->kelas;
    }

}