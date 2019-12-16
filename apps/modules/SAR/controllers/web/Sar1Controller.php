<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SarMasterResponse;
use Phalcon\Http\Response;

class Sar1Controller extends Controller
{
    public function indexAction()
    {
        $TIPESAR = 1;
        $NIP = $this->session->get("auth")['nip'];
           
        $RequestSarM = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSarM = new SarMasterService($SarRepository);
        $ResponseSarM = $ServiceSarM->execute($RequestSarM);
        
        $SarAssigment = $ResponseSarM->SarAssigment;
        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('SarAssigment',$SarAssigment);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/warek/kelola-sar-1/index');
    }

    // public function get

}