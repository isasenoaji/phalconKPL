<?php
namespace KPL\SAR\Domain\Models;
use Ramsey\Uuid\Uuid;

class SARId {
    private $id;

    public function __construct($id = null) {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() {
        return $this->id;
    }
    
    public function equals(SARId $sarId) {
        return $this->id === $sarId->id;
    }
}