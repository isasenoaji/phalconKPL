<?php

namespace KPL\SAR\Domain\Models;

class SAR5 extends SAR {
    private $mataKuliah;

    public function __construct(SARId $id, string $semester, string $mataKuliah, float $rencanaCapaian = 0, float $capaian = 0) {
        parent::__construct($id, $semester, $rencanaCapaian, $capaian);
        $this->mataKuliah = $mataKuliah;
    }
}