<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SetSasaranSarRequest;
use KPL\SAR\Application\SetSasaranSarService;
use KPL\SAR\Application\SetLockSarRequest;
use KPL\SAR\Application\SetLockSarService;
use KPL\SAR\Application\SetOpenAccessRequest;
use KPL\SAR\Application\SetOpenAccessService;
use Phalcon\Http\Message\Exception\InvalidArgumentException;

class Sar1Controller extends Controller
{
    public function indexAction()
    {
        if (!$this->session->has("auth")) {
            $this->flashSession->error("Anda perlu login");
            return $this->dispatcher->forward(array( 
            'controller' => 'users', 'action' => 'index' 
             )); 
        } 
        $TIPESAR = 1;
        $NIP = $this->session->get("auth")['nip'];
        
        //process list SAR institut
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

    public function setSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 1;
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
            return $this->response->redirect('/kelolasar-1');
        }
        else{
            $this->flashSession->error("Incorrect Method"); 
            return $this->response->redirect('/kelolasar-1');
        }
        
    }
    public function lockSarAction()
    {
        if ($this->request->isPost()) {
            $TIPESAR = 1;
            $NIP = $this->session->get("auth")['nip'];
            $idSar = $this->request->getPost("id");

            $RequestLockSar = new SetLockSarRequest($TIPESAR,$NIP,$idSar);
            $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
            $SetLockService = new SetLockSarService($SarRepository);
            
            if($SetLockService->execute($RequestLockSar)->status){
                $this->flashSession->success("Sukses mengunci sasaran .."); 
                
                $RequestOpenAccess = new SetOpenAccessRequest($idSar,$NIP);
                $OpenAccessService = new SetOpenAccessService($SarRepository);
                $OpenAccessService->execute($RequestOpenAccess);
            }else{
                $this->flashSession->error("Gagal, Nilai sasaran belum diisi");
            }
            return $this->response->redirect('/kelolasar-1');
        }
        else{
            $this->flashSession->error("Incorrect Method .."); 
            return $this->response->redirect("/kelolasar-1");
        }
    }
   

}