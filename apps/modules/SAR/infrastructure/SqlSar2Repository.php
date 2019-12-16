<?php


namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Models\Sar;
use KPL\SAR\Domain\Models\SarRepository;
use Phalcon\DiInterface;

class SqlSar2Repository implements SarRepository {
    privatee $TIPE;
    protected $di;


    public function __construct(DiInterface $di) {
        $this->di = $di;
    }

    public function byId($id): ?Sar {
        // TODO: Implement byId() method.
    }

    public function save(Sar $sar) {
        // TODO: Implement save() method.
    }

    public function all(): ?array {
        // TODO: Implement all() method.
    }
}