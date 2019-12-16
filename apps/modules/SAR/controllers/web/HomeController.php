<?php
namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;
use KPL\SAR\Application\SarListedRequest;
use KPL\SAR\Application\SarListedService;

class HomeController extends Controller{

    public function indexAction(){

        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/warek/dashboard/index');
    }
}