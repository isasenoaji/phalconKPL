<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Models\SarRepository;

class SarSupportService
{
    private $sarRepository;

    public function __construct(SarRepository $sarRepository)
    {
        $this->sarRepository = $sarRepository;
    }

    public function execute(SarRequest $request)
    {
    
    }
}