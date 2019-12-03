<?php

namespace KPL\SAR\Domain\Models;

class SAR2 extends SAR {
    private $fakultas;

    public function __construct(SARId $id, $semester, $fakultas, $rencanaCapaian = 0, $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->fakultas = $fakultas;
    }
}