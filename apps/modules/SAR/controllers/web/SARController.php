<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarRequest;
use KPL\SAR\Application\SarService;
use KPL\SAR\Application\SarResponse;

class SARController extends Controller
{
    public function indexAction()
    {
        $NIP = $this->session->get("auth")['nip'];
        $jabatanCollection = $this->session->get("auth")['jabatan'];
        $sarCollection = [];

        foreach($jabatanCollection as $jabatan){
           $requestSar = new SarRequest($NIP,$jabatan);
           $sarRepository =$this->di->get('sql_sars_repository',array($jabatan));
           $serviceSar = new SarService($sarRepository);
           $responseSar = $serviceSar->execute($requestSar);
           array_push($sarCollection,$responseSar);

        }
exit;
        var_dump($sarCollection);
        exit;
        $this->view->pick('sar/warek/kelolasar/index');
    }

}