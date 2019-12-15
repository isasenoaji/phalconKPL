<?php

namespace KPL\SAR\Domain\Model;


class Users {

    private $nip;
    private $nama;
    private $idJurusan;
    private $jabatan;
    private $password;

    public function __construct($nip, $nama, $idJurusan, $password) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->idJurusan = $idJurusan;
        $this->jabatan = array();
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

    public function addJabatan($value) {
        array_push($this->jabatan, $value);
    }
    public function password() {
        return $this->password;
    }
}