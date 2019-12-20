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
        $SarSupportAssigments = $this->SarRepository->getAllSarSupport($request->Param);
        $response = new SarSupportResponse();

        if ($SarSupportAssigments) {
            foreach ($SarSupportAssigments->getComponents() as $row) {
                $response->addSarAssigment($row->generateToArray());
            }
        }
        return $response;
    }
}