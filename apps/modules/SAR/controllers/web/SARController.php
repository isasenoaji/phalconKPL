<?php

namespace KPL\SAR\Controllers\Web;

use Phalcon\Mvc\Controller;

class SARController extends Controller
{
    public function indexAction()
    {
        $this->view->pick('SAR/index');
    }

}