<?php

use Phalcon\Di;
use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Events\Manager as EventsManager;

ini_set("display_errors", 1);
error_reporting(E_ALL);

define("ROOT_PATH", __DIR__);
define("APP_PATH", ROOT_PATH . '/../apps');

// Required for phalcon/incubator
include __DIR__ . "/../vendor/autoload.php";

// Use the application autoloader to autoload the classes
// Autoload the dependencies found in composer
$loader = new Loader();

$loader->registerNamespaces([

    'KPL\SAR\Controllers\Web' => APP_PATH . '/modules/SAR/controllers/web',
    'KPL\SAR\Controllers\Api' => APP_PATH . '/modules/SAR/controllers/api',
    'KPL\SAR\Domain\Model' => APP_PATH . '/modules/SAR/domain/models',
    'KPL\SAR\Infrastructure' => APP_PATH . '/modules/SAR/infrastructure',
    'KPL\SAR\Application' => APP_PATH . '/modules/SAR/application',

]);

$loader->register();

$di = new FactoryDefault();

Di::reset();

// Add any needed services to the DI here

Di::setDefault($di);