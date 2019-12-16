<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Model\SarRepository;

class SarMasterService
{
    private $SarRepository;

    public function __construct(SarRepository $SarRepository)
    {
        $this->SarRepository = $SarRepository;
    }

    public function execute(SarMasterRequest $request)
    {
        $SarAssigment = $this->SarRepository->getAllSarMaster($request->NIP);
        
        return new SarMasterResponse($SarAssigment,$this->SarRepository->getTipe());
    }
}