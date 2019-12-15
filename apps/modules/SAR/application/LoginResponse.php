<?php

namespace KPL\SAR\Application;

class LoginResponse
{
    public $nip;
    public $nama;
    public $id_fakultas;
    public $id_jurusan;
    public $jabatan;

    public function __construct($nip, $nama, $idJurusan, $jabatan)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->idJurusan = $idJurusan;
        $this->jabatan = $jabatan;
    }

}