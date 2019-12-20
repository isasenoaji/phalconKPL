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
        $response = new SarMasterResponse();

        if ($SarAssigment) {
            foreach ($SarAssigment->getComponents() as $row) {
                $response->addSarAssigment($row->generateToArray());
            }
        }
        return $response;
    }
}