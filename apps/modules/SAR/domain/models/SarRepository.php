<?php

namespace KPL\SAR\Domain\Model;

interface SarRepository {
   
    public function getAllSarMaster($nip) : ?SarAssigments;
    public function getAllSarSupport($Param) : ?SarSupportAssigments;
    public function getTipe();
    public function update($nip,$idSar,$sasaran);
    public function lock($nip,$idSar);
    public function getSasaran($nip,$idSar);
    public function setOpenAccess($nip, $idSar);
}