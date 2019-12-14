<?php


namespace KPL\SAR\Domain\Models;


class Periode {
    private $id;
    private $nama;
    private $is_active;

    public function __construct($id, $nama, $is_active) {
        $this->id = $id;
        $this->nama = $nama;
        $this->is_active;
    }

    public function id() {
        return $this->id;
    }

    public function nama() {
        return $this->nama;
    }

    public function is_active() {
        return $this->is_active;
    }

}