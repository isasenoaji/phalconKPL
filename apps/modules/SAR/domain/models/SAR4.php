<?php

namespace KPL\SAR\Domain\Models;

class SAR4 extends SAR {
    private $rmk;

    public function __construct(SARId $id, string $semester, string $rmk, float $rencanaCapaian = 0, float $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->rmk = $rmk;
    }
}