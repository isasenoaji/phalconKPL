<?php

return array(
    'SAR' => [
        'namespace' => 'Phalcon\Init\SAR',
        'webControllerNamespace' => 'Phalcon\Init\SAR\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\SAR\Controllers\Api',
        'className' => 'Phalcon\Init\SAR\Module',
        'path' => APP_PATH . '/modules/SAR/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'SAR',
        'defaultAction' => 'index'
    ],

    'backoffice' => [
        'namespace' => 'Phalcon\Init\BackOffice',
        'webControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Web',
        'apiControllerNamespace' => 'Phalcon\Init\BackOffice\Controllers\Api',
        'className' => 'Phalcon\Init\BackOffice\Module',
        'path' => APP_PATH . '/modules/backoffice/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],

);