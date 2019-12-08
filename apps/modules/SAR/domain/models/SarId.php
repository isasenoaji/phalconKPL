<?php
namespace KPL\SAR\Domain\Models;
use Ramsey\Uuid\Uuid;

class SarId {
    private $id;

    public function __construct($id = null) {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() {
        return $this->id;
    }
    
    public function equals(SarId $sarId) {
        return $this->id === $sarId->id;
    }
}