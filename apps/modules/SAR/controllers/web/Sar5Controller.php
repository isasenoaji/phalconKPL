<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;
use KPL\SAR\Application\SarMasterRequest;
use KPL\SAR\Application\SarMasterService;
use KPL\SAR\Application\SarMasterResponse;
use Phalcon\Http\Response;

class Sar5Controller extends Controller
{
    public function indexAction()
    {
        $NIP = $this->session->get("auth")['nip'];
        $ListSar = $this->session->get("ListSar");

        $this->view->setVar('TipeSar',$ListSar);
        $this->view->pick('sar/dosen/kelola-sar-5/index');
    }

    // public function get

}