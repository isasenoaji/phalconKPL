<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Models\SarRepository;

class SarMasterService
{
    private $sarRepository;

    public function __construct(SarRepository $sarRepository)
    {
        $this->sarRepository = $sarRepository;
    }

    public function execute(SarMasterRequest $request)
    {
        $SarAssigment = $this->sarRepository->getAllSarMaster($request->NIP);
        //echo $this->sarRepository->getTipe();exit;
        return new SARMasterResponse($SarAssigment,$this->sarRepository->getTipe());
    }
}