<?php
namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class HomeController extends Controller{

    public function indexAction(){
        //$NIP  = $this->session->get("auth")['nip'];
        //$nama = $this->session->get("auth")['nama'];
       // $this->view->setVar('tipeSar',$NIP,$nama);
        $this->view->pick('sar/warek/dashboard/index');
    }
}