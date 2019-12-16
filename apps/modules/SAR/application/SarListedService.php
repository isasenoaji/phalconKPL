<?php

namespace KPL\SAR\Application;

use KPL\SAR\Domain\Model\SarListedRepository;

class SarListedService
{
    private $SarListedRepository;

    public function __construct(
        SarListedRepository $SarListedRepository)
    {
        $this->SarListedRepository = $SarListedRepository;
    }

    public function execute(SarListedRequest $request)
    {
        $result = $this->SarListedRepository->getList($request->nip);
        
        return new SarListedResponse($result->list);
    }

}