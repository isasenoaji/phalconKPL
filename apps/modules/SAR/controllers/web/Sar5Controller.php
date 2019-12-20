<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SetSasaranSarService;
use KPL\SAR\Application\SetSasaranSarRequest;
use KPL\SAR\Application\SetLockSarRequest;
use KPL\SAR\Application\SetLockSarService;
class Sar5Controller extends Controller
{
    public function indexAction()
    {
        if (!$this->session->has("auth")) {
            $this->flashSession->error("Anda perlu login");
            return $this->dispatcher->forward(array( 
            'controller' => 'users', 'action' => 'index' 
             )); 
        } 
        $NIP = $this->session->get("auth")['nip'];
        $ListSar = $this->session->get("ListSar");
        $TIPESAR = 5;

        //process sar 5 > dosen MK
        $RequestSar = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSar = new SarMasterService($SarRepository);
        $ResponseSar = $ServiceSar->execute($RequestSar);

    
        $SarAssigment = $ResponseSar->SarAssigment;
        $this->view->setVar('SarAssigment',$SarAssigment);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/dosen/kelola-sar-5/index');
    }

    public function setSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 5;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");
            $sasaran = $this->request->getPost("sasaran");
            $RequestSetSar = new SetSasaranSarRequest($TIPESAR,$NIP,$idSar,$sasaran);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetSasaranService = new SetSasaranSarService($SarRepository);
            if($SetSasaranService->execute($RequestSetSar)){
                $this->flashSession->success("Sukses mengisi sasaran .."); 
            }else{
                $this->flashSession->error("Nilai sasaran tidak sesuai");
            }
            return $this->response->redirect('/kelolasar-5');
        }
        else{
            $this->flashSession->error("Incorrect Method"); 
            return $this->response->redirect('/kelolasar-5');
        }
        
    }

    public function lockSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 5;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");
            $RequestLockSar = new SetLockSarRequest($TIPESAR,$NIP,$idSar);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetLockService = new SetLockSarService($SarRepository);
            $ResponsLockSar = $SetLockService->execute($RequestLockSar);
            $this->flashSession->success("Sukses mengunci sasaran .."); 
            return $this->response->redirect("/kelolasar-5");
        }
        else{
            $this->flashSession->error("Incorrect Method .."); 
            return $this->response->redirect("/kelolasar-5");
        }
    }

}