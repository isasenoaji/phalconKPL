<?php

namespace KPL\SAR\Domain\Models;

class SAR3 extends SAR {
    private $departemen;

    public function __construct(SARId $id, $semester, $departemen, $rencanaCapaian = 0, $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->departemen = $departemen;
    }
}