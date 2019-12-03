<?php

namespace KPL\SAR\Domain\Models;

class SAR1 extends SAR {
    private $jenjang;

    public function __construct(SARId $id, string $semester, string $jenjang, float $rencanaCapaian = 0, float $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->jenjang = $jenjang;
    }
}