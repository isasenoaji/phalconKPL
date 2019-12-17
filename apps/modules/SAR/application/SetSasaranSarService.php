<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Model\SarRepository;


class SetSasaranSarService
{
    private $SarRepository;

    public function __construct(SarRepository $SarRepository)
    {
        $this->SarRepository = $SarRepository;
    }

    public function execute(SetSasaranSarRequest $request)
    {
        $status = $this->SarRepository->update($request->NIP,$request->idSar,$request->sasaran);
        
        return new SetSasaranSarResponse($status);

    }
}