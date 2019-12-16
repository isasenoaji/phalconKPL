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
<<<<<<< HEAD
        $response = new SarMasterResponse();

        if ($SarAssigment) {
            foreach ($SarAssigment as $row) {
                $response->addSarAssigment($row->generateToArray());
            }
        }
        return $response;
=======
        
        return new SarMasterResponse($SarAssigment,$this->SarRepository->getTipe());
>>>>>>> a6836f0f854374a559e79144ef77eaf6ae1a245c
    }
}