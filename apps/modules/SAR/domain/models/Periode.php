<?php


namespace KPL\SAR\Domain\Models;


class Periode {
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