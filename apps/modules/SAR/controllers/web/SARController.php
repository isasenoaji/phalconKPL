<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarRequest;
use KPL\SAR\Application\SarService;
use KPL\SAR\Application\SarResponse;
use Phalcon\Http\Response;

class SARController extends Controller
{
    public function indexAction()
    {
        $NIP = $this->session->get("auth")['nip'];
        $jabatanCollection = $this->session->get("auth")['jabatan'];
        $sarCollection = [];
        foreach($jabatanCollection as $jabatan){
           $requestSar = new SarRequest($NIP,$jabatan);
           $sarRepository = $this->di->get('sql_sars_repository',array($jabatan));
           $serviceSar = new SarService($sarRepository);
           $responseSar = $serviceSar->execute($requestSar);
           
           array_push($sarCollection,$responseSar);

        }
        // $response = new \Phalcon\Http\Response();
       
        // $response->setContent(json_encode( $sarCollection));
        // return $response;
        // // var_dump($sarCollection);
        // // exit;
        // $this->view->setVar('sarCollection',$sarCollection);
        $this->view->setVar('tipeSar',$jabatanCollection);
        $this->view->pick('sar/warek/kelolasar/index');
    }

}