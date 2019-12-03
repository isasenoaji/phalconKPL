<?php

namespace KPL\SAR\Domain\Models;

class SAR3 extends SAR {
    private $departemen;

    public function __construct(SARId $id, string $semester, string $departemen, float $rencanaCapaian = 0, float $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->departemen = $departemen;
    }
}