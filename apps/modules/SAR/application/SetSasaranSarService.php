<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Model\SasaranSarValue;
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
        $SasaranValue = new SasaranSarValue($request->TIPESAR,$request->NIP,$request->idSar,$request->sasaran);
        if($SasaranValue){
            $status = $this->SarRepository->update($request->NIP,$request->idSar,$request->sasaran);
            return new SetSasaranSarResponse($status);
        }
        else{
            return false;
        }
        
    }
}