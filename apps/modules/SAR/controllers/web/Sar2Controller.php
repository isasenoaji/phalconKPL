<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SarSupportRequest;
use KPL\SAR\Application\SarSupportService;
use KPL\SAR\Application\SetSasaranSarService;
use KPL\SAR\Application\SetSasaranSarRequest;
use KPL\SAR\Application\SetLockSarRequest;
use KPL\SAR\Application\SetLockSarService;

class Sar2Controller extends Controller
{
    public function indexAction()
    {
        if (!$this->session->has("auth")) {
            $this->flashSession->error("Anda perlu login");
            return $this->dispatcher->forward(array( 
            'controller' => 'users', 'action' => 'index' 
             )); 
        } 
        $TIPESAR = 2;
        $NIP = $this->session->get("auth")['nip'];
        
        //process fakultas
        $RequestSarM = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSarM = new SarMasterService($SarRepository);
        $ResponseSarM = $ServiceSarM->execute($RequestSarM);

        //process institut
        $jurusan = $this->session->get("auth")['idJurusan'];
        $RequestSarS = new SarSupportRequest($NIP,$jurusan);
        $SarRepository = $this->di->get('sql_sars_repository',array(1));
        $ServiceSarS = new SarSupportService($SarRepository);
        $ResponseSarS = $ServiceSarS->execute($RequestSarS);
        
    
        $SarAssigmentM = $ResponseSarM->SarAssigment;
        $SarAssigmentS = $ResponseSarS->SarAssigment;
        
        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('SarAssigmentM',$SarAssigmentM);
        $this->view->setVar('SarAssigmentS',$SarAssigmentS);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/dekan/kelola-sar-2/index');
    }
    public function setSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 2;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");
            $sasaran = $this->request->getPost("sasaran");
            $RequestSetSar = new SetSasaranSarRequest($TIPESAR,$NIP,$idSar,$sasaran);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetSasaranService = new SetSasaranSarService($SarRepository);
            $ResponsSetSar = $SetSasaranService->execute($RequestSetSar);
            $this->flashSession->success("Sukses mengisi sasaran .."); 
            return $this->response->redirect('/kelolasar-2');
        }
        else{
            $this->flashSession->error("Incorrect Method"); 
            return $this->response->redirect('/kelolasar-2');
        }
        
    }

    public function lockSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 2;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");
            $RequestLockSar = new SetLockSarRequest($TIPESAR,$NIP,$idSar);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetLockService = new SetLockSarService($SarRepository);
            $ResponsLockSar = $SetLockService->execute($RequestLockSar);
            $this->flashSession->success("Sukses mengisi sasaran .."); 
            return $this->response->redirect("/kelolasar-2");
        }
        else{
            $this->flashSession->error("Incorrect Method .."); 
            return $this->response->redirect("/kelolasar-2");
        }
    }

}