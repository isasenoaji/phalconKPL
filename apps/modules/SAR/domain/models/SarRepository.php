<?php


namespace KPL\SAR\Domain\Model;


interface SarRepository {
   
    public function getAllSarMaster($nip) : ?array;
    public function getTipe();
}