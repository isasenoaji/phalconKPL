<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Models\SarRepository;

class SarService
{
    private $sarRepository;

    public function __construct(SarRepository $sarRepository)
    {
        $this->sarRepository = $sarRepository;
    }

    public function execute(SarRequest $request)
    {
        $SarAssigment = $this->sarRepository->All($request->NIP);
        //echo $this->sarRepository->getTipe();exit;
        return new SarResponse($SarAssigment,$this->sarRepository->getTipe());
    }
}