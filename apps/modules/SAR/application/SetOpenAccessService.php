<?php

namespace KPL\SAR\Application;
use KPL\SAR\Domain\Model\SasaranSarValue;
use KPL\SAR\Domain\Model\SarRepository;

class SetOpenAccessService
{
    private $SarRepository;

    public function __construct(SarRepository $SarRepository)
    {
        $this->SarRepository = $SarRepository;
    }

    public function execute(SetOpenAccessRequest $request)
    {
        $open = $this->SarRepository->setOpenAccess($request->NIP, $request->IdSar);
        if($open){
            return true;
        }
        else{
            return false;
        }
        
    }
}