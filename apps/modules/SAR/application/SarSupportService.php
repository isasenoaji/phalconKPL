<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Model\SarRepository;

class SarSupportService
{
    private $SarRepository;

    public function __construct(SarRepository $SarRepository)
    {
        $this->SarRepository = $SarRepository;
    }

    public function execute(SarSupportRequest $request)
    {
        $SarAssigment = $this->SarRepository->getAllSarSupport();
        var_dump($SarAssigment);
        exit;
        return new SarSupportResponse($SarAssigment,$this->SarRepository->getTipe());
    }
}