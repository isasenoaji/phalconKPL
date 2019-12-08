<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;
use KPL\SAR\Infrastructure\SqlUserRepository;

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