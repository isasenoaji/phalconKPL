<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SarMasterResponse;
use Phalcon\Http\Response;

class Sar5Controller extends Controller
{
    public function indexAction()
    {
        $NIP = $this->session->get("auth")['nip'];
        $ListSar = $this->session->get("ListSar");
        $TIPESAR = 5;

        $RequestSar = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSar = new SarMasterService($SarRepository);
        $ResponseSar = $ServiceSar->execute($RequestSar);

    
        $SarAssigment = $ResponseSar->SarAssigment;
        $this->view->setVar('SarAssigment',$SarAssigment);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/dosen/kelola-sar-5/index');
    }

    // public function get

}