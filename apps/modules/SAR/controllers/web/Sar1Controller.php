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
        $NIP = $this->session->get("auth")['nip'];
        $jabatanCollection = $this->session->get("auth")['jabatan'];
        $sarCollection = [];
        foreach($jabatanCollection as $jabatan){
           $requestSar = new SarMasterRequest($NIP,$jabatan);
           $sarRepository = $this->di->get('sql_sars_repository',array($jabatan));
           $serviceSar = new SarMasterService($sarRepository);
           $responseSar = $serviceSar->execute($requestSar);
           
           array_push($sarCollection,$responseSar);

        }
        
        $this->view->setVar('tipeSar',$jabatanCollection);
        $this->view->pick('sar/warek/kelolasar/index');
    }

    // public function get

}