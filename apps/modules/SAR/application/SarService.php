<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Models\SarRepository;

class SarService
{
    private $sarRepository;

    public function __construct(
        SarRepository $sarRepository)
    {
        $this->sarRepository = $sarRepository;
    }

    public function execute(SarRequest $request)
    {
        $SarAssigment = $this->sarRepository->All($request->NIP);
        return new SarResponse($SarAssigment);
    }
}