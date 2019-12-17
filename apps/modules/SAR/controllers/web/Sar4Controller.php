<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SetSasaranSarService;
use KPL\SAR\Application\SetSasaranSarRequest;
use Phalcon\Http\Response;

class Sar4Controller extends Controller
{
    public function indexAction()
    {
        $TIPESAR = 4;
        $NIP = $this->session->get("auth")['nip'];
           
        $RequestSar = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSar = new SarMasterService($SarRepository);
        $ResponseSar = $ServiceSar->execute($RequestSar);
        
        $SarAssigment = $ResponseSar->SarAssigment;
        // // var_dump($SarAssigment);exit;
        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('SarAssigment',$SarAssigment);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/ketuaRMK/kelola-sar-4/index');
    }
    public function setSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 4;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");
            $sasaran = $this->request->getPost("sasaran");
            $RequestSetSar = new SetSasaranSarRequest($TIPESAR,$NIP,$idSar,$sasaran);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetSasaranService = new SetSasaranSarService($SarRepository);
            $ResponsSetSar = $SetSasaranService->execute($RequestSetSar);
            $this->flashSession->success("Sukses mengisi sasaran .."); 
            return $this->response->redirect('/kelolasar-4');
        }
        else{
            $this->flashSession->error("Incorrect Method"); 
            return $this->response->redirect('/kelolasar-4');
        }
        
    }

}