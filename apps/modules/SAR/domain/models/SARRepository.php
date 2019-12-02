<?php

namespace KPL\SAR\Domain\Models;

interface SARRepository {
    public function getById(SARId $id): SAR;
    public function save(SAR $sar);
    public function all(): ?array;
    public function update(SAR $sar): SAR;
}