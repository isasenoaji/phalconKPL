<?php


namespace KPL\SAR\Domain\Models;


interface SarRepository {
    public function byId(SarId $id) : ?Sar;
    public function save(Sar $sar);
    public function all() : ?array;
}