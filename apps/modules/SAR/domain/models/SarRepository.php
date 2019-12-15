<?php


namespace KPL\SAR\Domain\Models;


interface SarRepository {
   
    public function All($nip) : ?array;
    public function getTipe();
}