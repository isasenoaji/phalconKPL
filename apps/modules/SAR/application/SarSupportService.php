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
        $SarAssigment = $this->SarRepository->getAllSarSupport($request->Param);
        $response = new SarSupportResponse();

        if ($SarAssigment) {
            foreach ($SarAssigment as $row) {
                $response->addSarAssigment($row->generateToArray());
            }
        }
        return $response;
    }
}