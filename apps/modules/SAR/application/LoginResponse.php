<?php

namespace KPL\SAR\Application;

class LoginResponse
{
    public $nip;
    public $nama;
    public $id_fakultas;
    public $id_jurusan;
    public $jabatan;

    public function __construct($nip, $nama, $id_jurusan, $jabatan)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->id_jurusan = $id_jurusan;
        $this->jabatan = $jabatan;
    }

}