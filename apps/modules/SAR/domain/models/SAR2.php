<?php

namespace KPL\SAR\Domain\Models;

class SAR2 extends SAR {
    private $fakultas;

    public function __construct(SARId $id, string $semester, string $fakultas, float $rencanaCapaian = 0, float $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->fakultas = $fakultas;
    }
}