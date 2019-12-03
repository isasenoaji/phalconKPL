<?php

namespace KPL\SAR\Domain\Models;

class SAR {
    private $id;
    private $semester;
    private $rencanaCapaian;
    private $capaian;

    protected function __construct(SARId $id, $semester, $rencanaCapaian = 0, $capaian = 0) {
        $this->id = $id;
        $this->semester = $semester;
        $this->rencanaCapaian = $rencanaCapaian;
        $this->capaian = $capaian;
    }

    public function id() {
        return $this->id;
    }

    public function semester() {
        return $this->semester;
    }

    public function rencanaCapaian() {
        return $this->rencanaCapaian;
    }

    public function capaian() {
        return $this->capaian;
    }
}