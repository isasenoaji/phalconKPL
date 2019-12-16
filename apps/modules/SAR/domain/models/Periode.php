<?php


namespace KPL\SAR\Domain\Model;


class Periode {
    private $id;
    private $nama;
    private $isActive;

    public function __construct($id, $nama, $isActive) {
        $this->id = $id;
        $this->nama = $nama;
        $this->isActive = $isActive;
    }

    public function id() {
        return $this->id;
    }

    public function nama() {
        return $this->nama;
    }

    public function isActive() {
        return $this->isActive;
    }

}