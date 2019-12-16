<?php


namespace KPL\SAR\Domain\Model;


class Rmk {
    private $id;
    private $nama;
    private $idJurusan;
    private $idJenjang;

    public function __construct($id, $nama, $idJurusan, $idJenjang) {
        $this->id = $id;
        $this->nama = $nama;
        $this->idJurusan = $idJurusan;
        $this->idJenjang = $idJenjang;
    }

    public function id() {
        return $this->id;
    }

    public function nama() {
        return $this->nama;
    }

    public function idJurusan() {
        return $this->idJurusan;
    }

    public function idJenjang() {
        return $this->idJenjang;
    }
}