<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Model\SarRepository;


class SetLockSarService
{
    private $SarRepository;

    public function __construct(SarRepository $SarRepository)
    {
        $this->SarRepository = $SarRepository;
    }

    public function execute(SetLockSarRequest $request)
    {
        $status = $this->SarRepository->lock($request->NIP,$request->idSar);
        
        return new SetLockSarResponse($status);

    }
}