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
    // $tipeSar = $jabatan-1;
    // echo $tipeSar;
    if($jabatan == "Wakil Rektor"){
        $repo = new SqlSar1Repository($di);
    }
    else if($jabatan == "Dekan Fakultas"){
        $repo = new SqlSar1Repository($di);
    }
    else if($jabatan == "Kepala Jurusan"){
        $repo = new SqlSar1Repository($di);
    }
    else if($jabatan == "Ketua RMK"){
        $repo = new SqlSar1Repository($di);
    }
    else if($jabatan == "Dosen"){
        $repo = new SqlSar1Repository($di);
    }
    
    return $repo;
});