<?php
$router->add('/dashboard'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Home',
    'action'     => 'index',
]);

$router->add('/kelolasar-1'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'index',
]);

$router->add('/kelolasar-2'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar2',
    'action'     => 'index',
]);

$router->add('/kelolasar-3'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar3',
    'action'     => 'index',
]);
$router->add('/kelolasar-4'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar4',
    'action'     => 'index',
]);

$router->add('/kelolasar-5'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar5',
    'action'     => 'index',
]);

$router->add('/kelolasar-1/set'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'setSar',
]);

$router->add('/kelolasar-2/set'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'setSar',
]);

$router->add('/kelolasar-3/set'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'setSar',
]);

$router->add('/kelolasar-4/set'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'setSar',
]);

$router->add('/kelolasar-5/set'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Sar1',
    'action'     => 'setSar',
]);

$router->add('/testing'
	,[
	'namespace'  => 'KPL\SAR\Controllers\Web',
	'module' =>'SAR',
    'controller' => 'Testing',
    'action'     => 'index',
]);