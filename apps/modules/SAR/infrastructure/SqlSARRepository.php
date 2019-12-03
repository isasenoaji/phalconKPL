<?php


namespace KPL\SAR\Infrastructure;


use KPL\SAR\Domain\Models\SAR;
use KPL\SAR\Domain\Models\SARId;
use KPL\SAR\Domain\Models\SARRepository;
use Phalcon\DiInterface;

class SqlSARRepository implements SARRepository {
    protected $di;

    public function __construct(DiInterface $di) {
        $this->di = $di;
    }

    public function getId(SARId $id): SAR {
        $db = $this->di->getShared('db');

        // TODO: Implement getId() method.
    }

    public function save(SAR $sar) {
        // TODO: Implement save() method.
    }

    public function all(): ?array {
        // TODO: Implement all() method.
    }

    public function update(SAR $sar): SAR {
        // TODO: Implement update() method.
    }
}