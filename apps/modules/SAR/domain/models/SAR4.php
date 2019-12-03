<?php

namespace KPL\SAR\Domain\Models;

class SAR4 extends SAR {
    private $rmk;

    public function __construct(SARId $id, $semester, $rmk, $rencanaCapaian = 0, $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->rmk = $rmk;
    }
}