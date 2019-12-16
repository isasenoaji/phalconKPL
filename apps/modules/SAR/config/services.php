<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use KPL\SAR\Infrastructure\SqlUserRepository;
use KPL\SAR\Infrastructure\SqlSar1Repository;
use KPL\SAR\Infrastructure\SqlSar2Repository;
use KPL\SAR\Infrastructure\SqlSar3Repository;
use KPL\SAR\Infrastructure\SqlSar4Repository;
use KPL\SAR\Infrastructure\SqlSar5Repository;
use KPL\SAR\Infrastructure\SqlSarListedRepository;


$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di->setShared('sql_users_repository', function() use ($di) {
    $repo = new SqlUserRepository($di);

    return $repo;
});

$di->set('sql_sars_repository', function($TIPESAR) use ($di) {
    
    if($TIPESAR == 1 ){
        $repo = new SqlSar1Repository($di);
    }
    else if($TIPESAR == 2){
        $repo = new SqlSar2Repository($di);
    }
    else if($TIPESAR ==  3){
        $repo = new SqlSar1Repository($di);
    }
    else if($TIPESAR == 4){
        $repo = new SqlSar1Repository($di);
    }
    else if($TIPESAR == 5){
        $repo = new SqlSar1Repository($di);
    }
    
    return $repo;
});

$di->setShared('sql_sarlisted_repository', function() use ($di) {
    $repo = new SqlSarListedRepository($di);
    return $repo;
});