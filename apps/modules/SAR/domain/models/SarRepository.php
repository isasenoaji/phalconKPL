<?php


namespace KPL\SAR\Domain\Models;


interface SarRepository {
   
    public function getAllSarMaster($nip) : ?array;
    public function getTipe();
}