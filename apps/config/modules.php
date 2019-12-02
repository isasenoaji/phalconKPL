<?php

return array(
    'SAR' => [
        'namespace' => 'KPL\SAR',
        'webControllerNamespace' => 'KPL\SAR\Controllers\Web',
        'apiControllerNamespace' => 'KPL\SAR\Controllers\Api',
        'className' => 'KPL\SAR\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ],

    // 'backoffice' => [
    //     'namespace' => 'Phalcon\Init\BackOffice',
    //     'webControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
    //     'apiControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Api',
    //     'className' => 'Phalcon\Init\BackOffice\Module',
    //     'path' => APP_PATH . '/modules/backoffice/Module.php',
    //     'defaultRouting' => true,
    //     'defaultController' => 'index',
    //     'defaultAction' => 'index'
    // ],

);