<?php

namespace KPL\SAR\Domain\Model;


class Users {

    private $nip;
    private $nama;
    private $idJurusan;
    private $jabatan;
    private $password;

    public function __construct($nip, $nama, $idJurusan, $jabatan, $password) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->idJurusan = $idJurusan;
        $this->jabatan = $jabatan;
        $this->password = $password;
    }

    public function nip() {
        return $this->nip;
    }

    public function nama() {
        return $this->nama;
    }

    public function idJurusan() {
        return $this->idJurusan;
    }

    public function jabatan() {
        return $this->jabatan;
    }
    public function password() {
        return $this->password;
    }
}