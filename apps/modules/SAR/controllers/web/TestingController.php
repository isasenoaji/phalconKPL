<?php
namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use KPL\SAR\Application\SarSupportRequest;
use KPL\SAR\Application\SarSupportService;
use KPL\SAR\Application\SarSupportResponse;



use KPL\SAR\Application\SetLockSarRequest;
use KPL\SAR\Application\SetLockSarService;
use KPL\SAR\Application\SetLockSarRespon;


class TestingController extends Controller{

    public function indexAction(){
        $TIPESAR = 2;
        $RequestSarS = new SarSupportRequest($TIPESAR,2);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSarS = new SarSupportService($SarRepository);
        $ResponseSarS = $ServiceSarS->execute($RequestSarS);
        
        $Sar2Assigment = $ResponseSarS->SarAssigment;
        
        var_dump($Sar2Assigment);
        echo'done';
        exit;
    }

    public function lockAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 1;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");
            $RequestLockSar = new SetLockSarRequest($TIPESAR,$NIP,$idSar);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetLockService = new SetLockSarService($SarRepository);
            $ResponsLockSar = $SetLockService->execute($RequestLockSar);
            var_dump($ResponsLockSar);
            exit;
        }
    }
}