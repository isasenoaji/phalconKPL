<?php

namespace KPL\SAR;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'KPL\SAR\Controllers\Web' => __DIR__ . '/controllers/web',
            'KPL\SAR\Controllers\Api' => __DIR__ . '/controllers/api',
            'KPL\SAR\Domain\Model' => __DIR__ . '/domain/model',
        ]);

        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once __DIR__ . '/config/services.php';
    }
}