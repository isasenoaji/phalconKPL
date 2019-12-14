<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use KPL\SAR\Infrastructure\SqlUserRepository;
use KPL\SAR\Infrastructure\SqlSar1Repository;


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

$di->set('sql_sars_repository', function($jabatan) use ($di) {
    $tipeSar = $jabatan-1;
    echo $tipeSar;
    if($tipeSar==1){
        $repo = new SqlSar1Repository($di);
    }
    else if($tipeSar==5){
        $repo = new SqlSar1Repository($di);
    }
    
    return $repo;
});