<?php


namespace KPL\SAR\Domain\Model;


interface SarRepository {
   
    public function getAllSarMaster($nip);
    public function getTipe();
}