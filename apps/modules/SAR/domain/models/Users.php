<?php

namespace KPL\SAR\Domain\Model;


class Users {

    private $nip;
    private $nama;
    private $id_fakultas;
    private $id_jurusan;
    private $jabatan;

    public function __construct($nip, $nama, $id_fakultas, $id_jurusan, $jabatan) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->id_fakultas = $id_fakultas;
        $this->id_jurusan = $id_jurusan;
        $this->jabatan = $jabatan;
    }

    public function nip() {
        return $this->nip;
    }

    public function nama() {
        return $this->nama;
    }

    public function id_fakultas()
    {
        return $this->id_fakultas;
    }

    public function id_jurusan() {
        return $this->id_jurusan;
    }

    public function jabatan() {
        return $this->jabatan;
    }
}