<?php
namespace KPL\SAR\Controllers\Web;
use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

use KPL\SAR\Application\SarSupportRequest;
use KPL\SAR\Application\SarSupportService;
use KPL\SAR\Application\SarSupportResponse;


class TestingController extends Controller{

    public function indexAction(){
        $TIPESAR = 1;
        $RequestSarS = new SarSupportRequest($TIPESAR);
        $SarRepository = $this->di->get('sql_sars_repository',array($TIPESAR));
        $ServiceSarS = new SarSupportService($SarRepository);
        $ResponseSarS = $ServiceSarS->execute($RequestSarS);
        
        $Sar1Assigment = $ResponseSarS->SarAssigment;
        var_dump($Sar1Assigment);

    }
}