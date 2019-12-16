<?php


namespace KPL\SAR\Domain\Model;


class Jenjang {
    private $id;
    private $nama;

    public function __construct($id, $nama) {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function id() {
        return $this->id;
    }

    public function nama() {
        return $this->nama;
    }

}