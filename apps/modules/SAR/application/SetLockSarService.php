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
        if($status)
            return new SetLockSarResponse(true);
        else
            return new SetLockSarResponse(false);

    }
}