<?php

namespace KPL\SAR\Domain\Model;


class Users {

    private $nip;
    private $nama;
    private $id_jurusan;
    private $jabatan;
    private $password;

    public function __construct($nip, $nama, $id_jurusan, $jabatan, $password) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->id_jurusan = $id_jurusan;
        $this->jabatan = $jabatan;
        $this->password = $password;
    }

    public function nip() {
        return $this->nip;
    }

    public function nama() {
        return $this->nama;
    }

    public function id_jurusan() {
        return $this->id_jurusan;
    }

    public function jabatan() {
        return $this->jabatan;
    }
    public function password() {
        return $this->password;
    }
}