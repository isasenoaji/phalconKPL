<?php

namespace KPL\SAR\Domain\Model;

interface SarRepository {
   
    public function getAllSarMaster($nip) : ?array;
    public function getAllSarSupport($Param) : ?array;
    public function getTipe();
    public function update($nip,$idSar,$sasaran);
    public function lock($nip,$idSar);
}