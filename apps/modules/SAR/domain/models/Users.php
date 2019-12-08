<?php

namespace KPL\SAR\Domain\Model;


class Users {

    public $nip;
    public $nama;
    public $idFakultas;
    public $idJurusan;
    public $jabatan;

    public function __construct($nip, $nama, $idFakultas, $idJurusan, $jabatan) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->idFakultas = $idFakultas;
        $this->idJurusan = $idJurusan;
        $this->jabatan = $jabatan;
    }

    public function nip() {
        return $this->nip;
    }

    public function nama() {
        return $this->nama;
    }

    public function idFakultas()
    {
        return $this->idFakultas;
    }

    public function idJurusan() {
        return $this->idJurusan;
    }
}