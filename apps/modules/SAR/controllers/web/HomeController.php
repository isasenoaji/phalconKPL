<?php
namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use KPL\SAR\Application\SarListedRequest;
use KPL\SAR\Application\SarListedService;

class HomeController extends Controller{

    public function indexAction(){
        if (!$this->session->has("auth")) {
            $this->flashSession->error("Anda perlu login");
            return $this->dispatcher->forward(array( 
            'controller' => 'users', 'action' => 'index' 
             )); 
        } 

        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/dashboard/index');
    }
}