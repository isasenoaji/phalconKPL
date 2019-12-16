<?php


namespace KPL\SAR\Infrastructure;

use KPL\SAR\Domain\Model\Sar;
use KPL\SAR\Domain\Model\SarRepository;
use Phalcon\DiInterface;

class SqlSar3Repository implements SarRepository {
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