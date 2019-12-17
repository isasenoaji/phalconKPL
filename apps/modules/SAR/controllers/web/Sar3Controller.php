<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SarSupportRequest;
use KPL\SAR\Application\SarSupportService;
use KPL\SAR\Application\SetSasaranSarService;
use KPL\SAR\Application\SetSasaranSarRequest;

class Sar3Controller extends Controller
{
    public function indexAction()
    {
        $TIPESAR = 3; //sar 3 -> department
        $NIP = $this->session->get("auth")['nip'];
           
        //process departemen sar3
        $RequestSarM = new SarMasterRequest($NIP,$TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSarM = new SarMasterService($SarRepository);
        $ResponseSarM = $ServiceSarM->execute($RequestSarM);

        //process fakultas sar 2
        $jurusan = $this->session->get("auth")['id_jurusan'];
        $RequestSarS1 = new SarSupportRequest(2,$jurusan);
        $SarRepositoryS1 = $this->di->get('sql_sars_repository',array(2));
        $ServiceSarS1 = new SarSupportService($SarRepositoryS1);
        $ResponseSarS1 = $ServiceSarS1->execute($RequestSarS1);

        //process institut sar 3
        $RequestSarS2 = new SarSupportRequest(1,null);
        $SarRepositoryS2 = $this->di->get('sql_sars_repository',array(1));
        $ServiceSarS2 = new SarSupportService($SarRepositoryS2);
        $ResponseSarS2 = $ServiceSarS2->execute($RequestSarS2);
        
    
        $SarAssigmentM = $ResponseSarM->SarAssigment;
        $SarAssigmentS1 = $ResponseSarS1->SarAssigment;
        $SarAssigmentS2 = $ResponseSarS2->SarAssigment;
        // var_dump($SarAssigmentM);exit;
        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('SarAssigmentM',$SarAssigmentM);
        $this->view->setVar('SarAssigmentS1',$SarAssigmentS1);
        $this->view->setVar('SarAssigmentS2',$SarAssigmentS2);
        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/kajur/kelola-sar-3/index');
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
            return $this->response->redirect('/kelolasar-3');
        }
        else{
            $this->flashSession->error("Incorrect Method"); 
            return $this->response->redirect('/kelolasar-3');
        }
        
    }
}