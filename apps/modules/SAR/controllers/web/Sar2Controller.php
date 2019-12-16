<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SarSupportRequest;
use KPL\SAR\Application\SarSupportService;
use Phalcon\Http\Response;

class Sar2Controller extends Controller
{
    public function indexAction()
    {
        $TIPESAR = 2;
        $NIP = $this->session->get("auth")['nip'];
           
        $RequestSarM = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSarM = new SarMasterService($SarRepository);
        $ResponseSarM = $ServiceSarM->execute($RequestSarM);

        $jurusan = $this->session->get("auth")['id_jurusan'];
        $RequestSarS = new SarSupportRequest($NIP,$jurusan);
        $SarRepository = $this->di->get('sql_sars_repository',array(1));
        $ServiceSarS = new SarSupportService($SarRepository);
        $ResponseSarS = $ServiceSarS->execute($RequestSarS);
        
    
        $SarAssigmentM = $ResponseSarM->SarAssigment;
        $SarAssigmentS = $ResponseSarS->SarAssigment;
        // var_dump($SarAssigmentS);exit;
        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('SarAssigmentM',$SarAssigmentM);
        $this->view->setVar('SarAssigmentS',$SarAssigmentS);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/dekan/kelola-sar-2/index');
    }

    // public function get

}