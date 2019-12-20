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
       $sasaran = $this->SarRepository->getSasaran($request->NIP,$request->idSar);

       if($sasaran->CheckSasaran()){
          $status = $this->SarRepository->lock($request->NIP,$request->idSar);
          if($status)
             return new SetLockSarResponse(true);
          else
             return new SetLockSarResponse(false);
       }
       else{        
        return new SetLockSarResponse(false);
       }

    }
}