<?php

namespace KPL\SAR\Domain\Model;

interface SarRepository {
   
<<<<<<< HEAD
    public function getAllSarMaster($nip);
=======
    public function getAllSarMaster($nip) : ?array;
    public function getAllSarSupport() : ?array;
>>>>>>> a6836f0f854374a559e79144ef77eaf6ae1a245c
    public function getTipe();
}